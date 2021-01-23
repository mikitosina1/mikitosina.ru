class FetchData {
    //при асинхронном нужно поставить ожидание
    getResource = async url => {
                    //ожидание
        const result = await fetch(url);

        if (!result.ok) {
            throw new Error('Произошла ошибка: ' + result.status);
        }
        return result.json();
    }

    getPost = () => this.getResource('db/dataBase.json');
}


//основной рабочий класс
class Twitter {
    constructor({ user, listElem, modalElems, tweetElems,
                    classDeleteTweet, classLikeTweet, sortElem,
                    showUserPostElem, showLikedPostElem }) {
        const fetchData = new FetchData();
        //все посты
        this.user = user;
        this.tweets = new Posts();
        this.elements = {
            listElem: document.querySelector(listElem),
            sortElem: document.querySelector(sortElem),
            //заводим модал
            modal: modalElems,
            //эл-ты твита из new, E6 правило (вместо tweetElems: tweetElems)
            tweetElems,
            showUserPostElem: document.querySelector(showUserPostElem),
            showLikedPostElem: document.querySelector(showLikedPostElem),
        };

        this.class = { classDeleteTweet, classLikeTweet};
        this.sortDate = true;

        fetchData.getPost().then(data => {
            data.forEach(this.tweets.addPost);
            this.showAllPost();
        });

        this.elements.modal.forEach(this.handlerModal, this);
        this.elements.tweetElems.forEach(this.addTweet, this);

        this.elements.listElem.addEventListener('click', this.HandlerTweet);
        this.elements.sortElem.addEventListener('click', this.changeSort);

        this.elements.showLikedPostElem.addEventListener('click', this.showLikedPost());
        this.elements.showUserPostElem.addEventListener('click', this.showUserPost());
    }

    renderPosts(posts) {
        const sortPost = posts.sort(this.sortFields());
        this.elements.listElem.textContent = '';
        sortPost.forEach(({ id, userName, nickname, text, img, likes,
                            getDate, liked }) => {
            this.elements.listElem.insertAdjacentHTML('beforeend' , `
                <li>
                    <article class="tweet">
                        <div class="row">
                            <img class="avatar" src="images/${nickname}.jpg" alt="Аватар пользователя ${nickname}">
                            <div class="tweet__wrapper">
                                <header class="tweet__header">
                                    <h3 class="tweet-author">${userName}
                                    <span class="tweet-author__add tweet-author__nickname">@${nickname}</span>
                                    <time class="tweet-author__add tweet__date">${getDate()}</time>
                                    </h3>
                                    <button class="tweet__delete-button chest-icon" data-id="${id}"></button>
                                </header>
                                <div class="tweet-post">
                                <p class="tweet-post__text">${text}</p>
                                ${img ? 
                                    `<figure class="tweet-post__image">
                                        <img src="${img}" alt="иллюстрация поста ${nickname}">
                                    </figure>` 
                                    :
                                    ''
                                }
                                </div>
                            </div>
                        </div>
                        <footer>
                            <button class="tweet__like ${liked ? this.class.classLikeTweet.active : ''}" data-id="${id}">
                                ${likes}
                            </button>
                        </footer>
                    </article>
                </li>
            `);
        })
    }

    showUserPost() {
        const post = this.tweets.posts.filter(item => item.nick === this.nick);
        this.renderPosts(post);
    }

    showLikedPost() {
        const post = this.tweets.post.filter(item => item.liked);
        this.renderPosts(post);

    }

    showAllPost() {
        this.renderPosts(this.tweets.posts);
    }

    handlerModal({ button, modal, overlay, close }) {
        //селекторы для получ эл-тов
        const buttonElem = document.querySelector(button);
        const modalElem = document.querySelector(modal);
        const overlayElem = document.querySelector(overlay);
        const closeElem = document.querySelector(close);

        //открыть модалку
        const openModal = () => {
            modalElem.style.display = 'block';

        }

        // такая конструкция для возсожности добавления доп модалок
        //скрыть модалку
        const closeModal = (elem, event) => {
            const target = event.target;
            if(target === elem){
                modalElem.style.display = 'none';
            }
        }

        //открыть модальное окно (всплывающее)
        buttonElem.addEventListener('click', openModal);
        //скрыть модал
        if (closeElem) {
            closeElem.addEventListener('click', closeModal.bind(null, closeElem));
        }

        if (overlay) {
            overlayElem.addEventListener('click', closeModal.bind(null, overlayElem));
        }

        this.handlerModal.closeModal = () => {
            modalElem.style.display = 'none'
        }
    }

    addTweet({ text, img, submit }) {
        const textElem = document.querySelector(text);
        const imgElem = document.querySelector(img);
        const submitElem = document.querySelector(submit);

        let imgUrl = '';
        let tempString = textElem.innerHTML;

        submitElem.addEventListener('click', () => {
            this.tweets.addPost({
                userName: this.user.name,
                nickname: this.user.nick,
                text: textElem.innerHTML,
                img: imgUrl
            })
            this.showAllPost();
            this.handlerModal.closeModal();
        })

        textElem.addEventListener('click', () => {
            // что-бы не удалять написанную строку
            if (textElem.innerHTML === tempString) {
                textElem.innerHTML = '';
            }
        })

        imgElem.addEventListener('click', () => {
            imgUrl = prompt('Введите адрес изображения.')
        })
    }

    handlerTweet = event => {
        const target = event.target;
        if(target.classList.contains(this.class.classDeleteTweet) ) {
            this.tweets.deletePost(target.dataset.id);
            this.showAllPost();
        }

        if(target.classList.contains(this.class.classLikeTweet.like)) {
            this.tweets.likePost(target.dataset.id);
            this.showAllPost();
        }
    }
    //сортировка
    changeSort = () => {
        this.sortDate = !this.sortDate;
        this.showAllPost();
    }
    //методы сортировки
    sortFields() {
        if(this.sortDate) {
            return (a, d) => {
                const dateA = new Date(a.postDate);
                const dateB = new Date(b.postDate);
                return dateB - dateA;
            }
        } else {
            return (a, b) => b.likes - a.likes;
        }
    }



}

class Posts{
    constructor({ posts = [] } = {}) {
        this.posts = posts;
    }

    addPost = (tweets) => {
        this.posts.push(new Post(tweets));
    }

    deletePost(id) {
        //формирует новый массив без того поста, чей id чекнут
        this.posts = this.posts.filter(item => item.id !== id)
    }

    likePost(id) {
        this.posts.forEach(item => {
            if(item.id === id) {
                item.changeLike();
            }
        })
    }
}

class Post {
    constructor({ id, userName, nickname, postDate, text, img, likes = 0 }) {
        this.id = id || this.generateID();
        this.userName = userName;
        this.nickname = nickname;
        this.postDate = postDate ? this.correctDate(postDate) : new Date();
        this.text = text;
        this.img = img;
        this.likes = likes;
        this.liked = false;
    }

    changeLike () {
        this.liked = !this.liked;
        if (this.liked) {
            this.likes++;
        } else {
            this.likes--;
        }
    }

    generateID() {
        return Math.random().toString(32).substring(2, 9) + (+new Date).toString(16);
    }

    getDate = () => {

        const options = {
            year: 'numeric',
            month: 'numeric',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
        };
        return this.postDate.toLocaleString('ru-RU', options);
    }
    //корректировка в БД для firefox (обработка из класса POST)
    correctDate(date) {
        if (isNaN(Date.parse(date))) {
            console.log('Некорректная дата')
            date = date.replace(/\./g, '/') //найти все тчк и замена на слеш
            //date = date.replaceAll('.', '/') - хороший аналог но где-то не работает
        }
        return new Date(date)
    }
}

const twitter = new Twitter({
    listElem: '.tweet-list',
    user: {
        name: 'Кто-то',
        nick: 'miki'
    },
    modalElems: [
        {
            button: '.header__link_tweet',
            modal: '.modal',
            overlay: '.overlay',
            close: '.modal-close__btn',
        }
    ],
    tweetElems: [
        {
            text: '.modal .tweet-form__text',
            img:'.modal .tweet-img__btn',
            submit:'.modal .tweet-form__btn',
        },
        {
            text: '.tweet-form__text',
            img:'.tweet-img__btn',
            submit:'.tweet-form__btn',
        }
    ],

    classDeleteTweet: '.tweet__delete-button',
    classLikeTweet: {
        like: '.tweet__like',
        active: '.tweet__like_active'
    },
    sortElem: '.header__link_sort',
    showUserPostElem: '.header__link_profile',
    showLikedPostElem: '.header__link_likes',
})

// генерация id и смена каждую милисек с мат префиксом для защиты дублирования id
// console.log(Math.random().toString(32).substring(2, 9) + (+new Date).toString(16));

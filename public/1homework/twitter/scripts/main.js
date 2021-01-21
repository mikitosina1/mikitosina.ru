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

    getPost = async () => await this.getResource('db/dataBase.json');
}

const obj = new FetchData();

//console.log(obj);

obj.getPost().then((data) => {
    //console.log(data)
});

//основной рабочий класс
class Twitter {
    constructor({ user, listElem, modalElems, tweetElems }) {
        this.user = user
        const fetchData = new FetchData()
        //все посты
        this.tweets = new Posts()
        this.elements = {
            listElem: document.querySelector(listElem),
            //заводим модал
            modal: modalElems,
            //эл-ты твита из new, E6 правило (вместо tweetElems: tweetElems)
            tweetElems
        }

        fetchData.getPost().then(data => {
            data.forEach(this.tweets.addPost)
            this.showAllPost()
        });

        this.elements.modal.forEach(this.handlerModal, this);
        this.elements.tweetElems.forEach(this.addTweet, this);
    }

    renderPosts(tweets) {
        this.elements.listElem.textContent = '';

        tweets.forEach(({ id, userName, nickname, text, img, likes, getDate }) => {
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
                            <button class="tweet__like">
                                ${likes}
                            </button>
                        </footer>
                    </article>
                </li>
            `);
        })
    }

    showUserPost() {

    }

    showLikesPost() {

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
            console.log(event);
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
            overlayElem.addEventListener('click', closeModal.bind(null));
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

    showAllPost() {
        this.renderPosts(this.tweets.posts)
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

    }

    likePost(id) {

    }
}

class Post {
    constructor({ id, userName, nickname, postDate, text, img, likes = 0 }) {
        this.id = id || this.generateID();
        this.userName = userName;
        this.nickname = nickname;
        this.postDate = postDate ? new Date(postDate) : new Date();
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
}

new Twitter({
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
    //TODO дом задание активировать!
    tweetElems: [
        {
            text: '.modal .tweet-form__text',
            img:'.modal .tweet-img__btn',
            submit:'.modal .tweet-form__btn',
        }
    ]
})

// генерация id и смена каждую милисек с мат префиксом для защиты дублирования id
// console.log(Math.random().toString(32).substring(2, 9) + (+new Date).toString(16));

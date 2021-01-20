class Twitter {
    constructor({ listElem }) {
        this.tweets = new Posts();
        this.elements = {
            listElem: document.querySelector(listElem)
        }
    }

    renderPosts() {

    }

    showUserPost() {

    }

    showLikesPost() {

    }

    openModal() {

    }

    showAllPost() {

    }
}

class Posts{
    constructor({ posts = [] } = {}) {
        this.posts = posts;
    }

    addPost (tweet){
        const post = new Post(tweet);
        this.posts.push(post);

    }

    deletePost(id) {

    }

    likePost(id) {

    }
}

class Post {
    constructor(param) {
        thisid = param.id;
        this.userName = param.userName;
        this.nickname = param.nickname;
        this.postDate = param.postDate;
        this.text = param.text;
        this.img = param.img;
        this.likes = param.likes;
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
}

new Twitter({
    listElem: '.tweet-list'
})
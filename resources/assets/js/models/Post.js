class Post {
    static all(then) {
        return axios.get('/')
            .then(response => then(response.data));
        
    }
}

export default Post;
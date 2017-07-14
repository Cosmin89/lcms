<template>
 <div class="container">
        <div class="columns">
            <div class="column">
                <div class="post" v-for="post in posts">
                <!-- First Blog Post -->
                <h2>
                    <a href="#">{{ post.title }}</a>
                </h2>
                <p class="lead">
                    by <a href="#">{{ post.author }}</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span>Posted on {{ post.created_at | ago  }}</p>
                <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                <hr>
                <div class="post-content" v-text="post.content"></div>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    import Post from '../models/Post';

    export default {
        
        data() {
            return {
                posts: []
            }
        },

        filters: {
            ago(date) {
               return moment(date).fromNow(); 
            },
        },

        created() {
            Post.all(posts => this.posts = posts);
                
        },

        // methods: {
        //     addStatus(status) {
        //         this.statuses.unshift(status);

        //         alert('Your status has been added to the stream.');

        //         window.scrollTo(0, 0);
        //     }
        // }
    }
</script>

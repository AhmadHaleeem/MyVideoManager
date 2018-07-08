<template>
    <div class="comment-wrapper">
        <comment-add/>

        <div v-for="comment in comments" :key="comment.id">
            <app-comment :comment="comment"></app-comment>
        </div>
    </div>
</template>


<script>
    import axios from 'axios'
    import AppComment from './Comment.vue'
    import CommentAdd from './CommentAdd.vue'
    export default {
        components: { AppComment, CommentAdd },
        created() {
            window.eventBus.$on('commentAddEvent', comment => this.handleNewCommentAdded(comment))
            this.loadComments()
        },
        data() {
            return {
                comments: []
            }
        },
        methods: {
            handleNewCommentAdded(comment){
              this.comments.unshift(comment)
            },
            loadComments() {
                var url = window.Laravel.basePath + 'api/video/comments'
                var postData = {
                    videoId: this.$route.params.id
                }

                axios.post(url, postData)
                    .then(response => {
                        this.comments = response.data
                    })
            }
        }

    }
</script>
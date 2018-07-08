<template>
    <div class="VideoDetail__wrapper row mt-3" v-if="video">
        <div class="col-sm-8 col-sm-push-2">
            <h2> {{ video.snippet.title }} </h2>
            <br>
            <small>Channel: {{ video.snippet.channelTitle }}</small>

            <h3 class="text-black-50">{{ video.snippet.description }}</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe :src="url" class="embed-responsive-item"></iframe>
            </div>
        </div>
        <div class="col-sm-8 col-sm-push-2">
            <comment-wrapper></comment-wrapper>
        </div>

    </div>
</template>


<script>
    import CommentWrapper from './Comments/CommentWrapper.vue'
    export default {
        components: { CommentWrapper },
        created() {
           if (this.$route.params.video == undefined) {
               this.$router.push({ name: 'youtube-dash' })
           }
           this.videoId = this.$route.params.id
            this.url = `https://www.youtube.com/embed/${this.videoId}`
            this.video = this.$route.params.video
        },
        data() {
            return {
                videoId: null,
                video: null,
                url: null
            }
        }
    }
</script>
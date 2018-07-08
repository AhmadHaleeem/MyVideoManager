<template>
    <div class="VideoDetail__wrapper row mt-3" v-if="video">
        <div class="col-sm-8 col-sm-push-2">
            <h2> {{ video.snippet.title }} </h2>
            <br>
            <small>Channel: {{ video.snippet.channelTitle }}</small>

            <div class="embed-responsive embed-responsive-16by9 mb-3">
                <iframe :src="url" class="embed-responsive-item"></iframe>
            </div>
            <p class="text-black-50">{{ video.snippet.description }}</p>

            <playlist-wrapper></playlist-wrapper>
        </div>
        <div class="col-sm-8 col-sm-push-2">
            <comment-wrapper></comment-wrapper>
        </div>

    </div>
</template>


<script>
    import CommentWrapper from './Comments/CommentWrapper.vue'
    import GetVideo from './GetVideo'
    import PlaylistWrapper from './Playlist/PlaylistWrapper.vue'

    export default {
        components: {CommentWrapper, PlaylistWrapper},
        created() {
            this.videoId = this.$route.params.id
            this.url = `https://www.youtube.com/embed/${this.videoId}`
            GetVideo({
                apiKey: 'AIzaSyAgx4pW3RzNCPeab64emXJa1AwHfM1cjCs',
                videoId: this.videoId
            }, response => {
                this.video = response[0]
            })
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
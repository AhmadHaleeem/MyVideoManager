<template>
    <div class="YoutubeDash__wrapper">
        <video-group :videos="videos"></video-group>
    </div>
</template>

<script>
    import Search from './Search'
    import VideoGroup from './VideoGroup.vue'

    export default {
        components: { VideoGroup },
        created() {
            Search({
                apiKey: 'AIzaSyAgx4pW3RzNCPeab64emXJa1AwHfM1cjCs',
                term: 'x men',
                items: 10
            }, response => this.videos = response)
        },
        data() {
            return {
                videos: null
            }
        },

    }
</script>
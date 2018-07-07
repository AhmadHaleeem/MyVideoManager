<template>
    <div class="YoutubeDash__wrapper">
        <finder></finder>
        <div v-if="!loading">
            <video-group :videos="videos"></video-group>
        </div>

        <div v-if="loading">
            Loading....
        </div>
    </div>
</template>

<script>
    import Search from './Search'
    import VideoGroup from './VideoGroup.vue'
    import Finder from './Finder.vue'

    export default {
        components: {VideoGroup, Finder},
        created() {
            Search({
                apiKey: 'AIzaSyAgx4pW3RzNCPeab64emXJa1AwHfM1cjCs',
                term: 'x men',
                items: 10
            }, response => this.handelSearchResults(response))

            window.eventBus.$on('searchForYoutubeStarted', () => {
                this.loading = true
            })

            window.eventBus.$on('searchResultFromYoutube', videos => {
                console.log('searchResult', videos)
                this.loading = false
                this.videos = videos
            })
        },
        data() {
            return {
                videos: null,
                loading: true
            }
        },
        methods: {
            handelSearchResults(result) {
                this.loading = false
                this.videos = result
            }
        }

    }
</script>
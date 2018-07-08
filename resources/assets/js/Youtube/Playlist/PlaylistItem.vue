<template>
    <li class="list-group-item cursor" @click="saveToPlaylist">{{ item.name }}</li>
</template>


<script>
    export default {
        props: ['item'],
        methods: {
            saveToPlaylist() {
                let postData = {
                    videoId: this.$route.params.id,
                    playlistId:  this.item.id
                }

                axios.post('/api/playlist-entry', postData)
                    .then(response => {
                        console.info(response)
                    })
            }
        }
    }
</script>
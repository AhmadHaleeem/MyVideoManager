<template>
    <div class="playlist-wrapper">
        <button class="btn btn-sm btn-primary" @click="playlistOpen">+ add</button>

        <div class="list-wrapper" v-if="showPlaylist">

            <div v-if="!loading">
                <div class="list">
                    <div class="mb-2 clearfix">
                        <div class="float-left">My Playlist</div>
                        <div class="float-right cursor" @click="playlistOpen">Close</div>
                    </div>

                    <div class="clearfix mb-2">
                        <div class="list-group">
                            <playlist-item v-for="item in playlist" :key="item.id" :item="item"></playlist-item>
                        </div>
                    </div>

                </div>
            </div>

            <div v-if="loading">
                <i class="fas fa-sync fa-spin"></i>
            </div>


            <form @submit.prevent="handelSavePlaylist">
                <div class="form-group row">
                    <div class="col-sm-7" style="margin-left: 20px;">
                        <input type="text" placeholder="Create new playlist" class="form-control"
                               v-model="playlistName">
                    </div>
                    <div class="col-sm-4">
                        <input type="checkbox" v-model="isPrivate"> Private
                    </div>

                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import PlaylistItem from './PlaylistItem.vue'

    export default {
        components: {PlaylistItem},
        data() {
            return {
                showPlaylist: false,
                playlist: null,
                playlistName: '',
                isPrivate: false,
                loading: true
            }
        },
        methods: {
            playlistOpen() {
                this.loadUserPlaylists()
            },
            loadUserPlaylists() {
                this.showPlaylist = !this.showPlaylist
                axios.get('/api/user/playlists')
                    .then(response => {
                        setTimeout(() => {
                            this.playlist = response.data
                            this.loading = false
                        }, 1000)
                    })
            },
            handelSavePlaylist() {
                let postData = {
                    name: this.playlistName,
                    isPrivate: this.isPrivate
                }
                axios.post('/api/playlist', postData)
                    .then(response => {
                        this.playlist.unshift(response.data)

                    })
                    .catch(error => {
                        if (error.response.status === 403) {
                            alert(error.response.data.message)
                        }
                    })
            }
        }
    }
</script>

<style scoped lang="scss">
    .playlist-wrapper {
        position: relative;
        .list-wrapper {
            position: absolute;
            top: -334px;
            z-index: 999;
            background-color: white;
            padding: 1rem;
            border: 1px solid #efefef;
            min-width: 29rem;
            .list {
                padding: 0.45rem 1.25rem;
            }
        }
    }
</style>
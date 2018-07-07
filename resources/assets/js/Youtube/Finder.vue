<template>
    <div class="Search__wrapper">
        <div class="container">
            <form @submit.prevent="handleFormSubmit">
                <input type="text" class="form-control" v-model="searchString">

            </form>
        </div>
    </div>
</template>


<script>
    import Search from './Search'
    export default {
        data() {
            return {
                searchString: ''
            }
        },
        methods: {
            handleFormSubmit() {
                window.eventBus.$emit('searchForYoutubeStarted')
                Search({
                    apiKey: 'AIzaSyAgx4pW3RzNCPeab64emXJa1AwHfM1cjCs',
                    term: this.searchString,
                    items: 10
                }, data =>{
                    window.eventBus.$emit('searchResultFromYoutube', data)
                    this.searchString = ''
                })
            }
        }
    }
</script>

<style lang="scss">
    .Search__wrapper{
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>

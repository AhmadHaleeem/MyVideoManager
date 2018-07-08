<template>
    <div>
        <div class="comment__wrapper mb-3">
            <div class="card-body">
                {{ comment.body }}
                <br>
                <small class="text-muted">{{ comment.created_at }}</small>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        props: ['comment']
    }
</script>

<style>
    .comment__wrapper{
        background-color: #fff;
        border-radius: 7px;
    }
</style>
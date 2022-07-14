<template>
    <div class="card mb-3">
        <h3>{{post.title}}</h3>
        <p>{{post.content}}</p>
    </div>
</template>

<script>
    export default {
        name: 'PostItem',
        props : {
            post: Object
        }
    }
</script>

<style lang="scss" scoped>

</style>

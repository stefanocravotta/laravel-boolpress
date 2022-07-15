<template>
    <div class="card mb-3 p-3">

        <h3>
            <router-link :to="{name: 'detail', params: {slug: post.slug}}">{{post.title}}</router-link>
        </h3>
        <p>{{post.content}}</p>

        <div v-if="post.category">
            <p>Categoria : {{post.category.name}}</p>
        </div>

        <div v-if="post.tags.length > 1">
            <span>Tags :</span>
            <span v-for="tag in post.tags" class="mr-2 badge bg-success">{{tag.name}}</span>
        </div>

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

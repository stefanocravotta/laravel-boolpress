<template>
    <div class="side-bar">
        <h3>Categorie</h3>
        <ul>
            <li
            v-for="category in categories"
            :key="`cat${category.id}`"
            @click="$emit('searchPostsByCategory', category.slug )"
            >{{category.name}}</li>
        </ul>
        <!-- <h3>Tags</h3>
        <ul>
            <li
            v-for="tag in tags"
            :key="`tag${tag.id}`"
            @click="$emit('searchPostsByTag', tag.slug )"
            >{{tag.name}}</li>
        </ul> -->
    </div>
</template>

<script>
    export default {
        name: 'SideBarComp',
        props: {
            categories : Array,
            tags: Array
        }
    }
</script>

<style lang="scss" scoped>
.side-bar{
    position: fixed;
    top: 50px;
    right: 30px;
    z-index: 999;
    padding: 15px;
    &:hover{
        box-shadow: 2px 2px 20px  black;
    border-radius: 10px;
    transition: all .3s;
    }
    li{
        cursor: pointer;
        &:hover{
            text-decoration: underline;
        }
    }
}
</style>

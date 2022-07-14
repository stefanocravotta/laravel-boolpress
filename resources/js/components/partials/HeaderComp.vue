<template>
    <header>
        <ul class="d-flex justify-content-center">
            <li>
                <router-link :to="{name: 'home'}">Home</router-link>
            </li>
            <li>
                <router-link :to="{name: 'blog'}">Blog</router-link>
            </li>
            <li>
                <router-link :to="{name: 'about'}">About</router-link>
            </li>
            <li>
                <router-link :to="{name: 'contacts'}">Contacts</router-link>
            </li>
        </ul>
    </header>
</template>

<script>
    export default {
        name : 'HeaderComp'
    }
</script>

<style lang="scss" scoped>
header{
    height: 60px;
    padding: 20px;
    ul{
        list-style: none;
        li{
            margin: 0 20px;
            a{
                color: black;
                text-decoration: none;
                &:hover,
                &.active{
                    color: red;
                }
            }
        }
    }
}
</style>

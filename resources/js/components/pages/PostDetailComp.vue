<template>
    <div class="container py-5 text-center sc-card">
        <h1 class="py-2">{{post.title}}</h1>
        <div v-if="post.immagine">
            <img :src="post.immagine" alt="">
        </div>
        <div v-else>
            <img class="img-fluid" src="../../../../public/image/_DSC4314-65.jpg" alt="">
        </div>
        <p class="py-2">{{post.content}}</p>
        <button class="btn btn-dark"><router-link class="text-reset" :to="{name: 'blog'}"><< Torna ai post</router-link></button>
    </div>
</template>

<script>
import Axios from 'axios'
import { apiUrl } from '../../data/config'

    export default {
        name : 'PostDetailComp',
        data() {
            return {
                post: {
                    title: '',
                    content: '',
                    category: ""
                },
                apiUrl,
            }
        },
        mounted() {
            this.getApi()
        },
        methods: {
            getApi(){
                Axios.get(this.apiUrl + '/' + this.$route.params.slug )
                .then(r =>{
                    this.post = r.data
                });
            }
        },
    }
</script>

<style lang="scss" scoped>
.sc-card{
    width: calc(100% / 3);
    img{
        border-radius: 20px;
    }
}
</style>

<template>
    <div class="container text-center">
        <h1>{{post.title}}</h1>
        <p>{{post.content}}</p>
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

</style>

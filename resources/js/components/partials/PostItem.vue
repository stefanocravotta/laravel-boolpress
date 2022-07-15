<template>
    <router-link
        :to="{name: 'detail', params: {slug: post.slug}}" class="py-1 sc-card">

        <h4 class="h-25">
            <router-link  class="text-card" :to="{name: 'detail', params: {slug: post.slug}}">{{post.title}}</router-link>
        </h4>
        <div class="img-card" v-if="post.immagine">
            <img :src="post.immagine" alt="">
        </div>
        <div class="img-card" v-else>
            <img class="img-fluid" src="../../../../public/image/_DSC4314-65.jpg" alt="">
        </div>
        <div class="h-25">
            <i class="text-reset">{{formatDate}}</i>
            <p class="py-1 text-reset">{{shortContent}}</p>
        </div>
    </router-link>
</template>

<script>
    export default {
        name: 'PostItem',
        props : {
            post: Object
        },
        computed:{
            shortContent(){
                return this.post.content.substr(0,50) + "...";
            },
            formatDate(){
                const d = new Date(this.post.updated_at);
                let day = d.getDate();
                let month = d.getMonth() + 1;
                const year = d.getFullYear();
                if(day < 10) day = '0' + day;
                if(month < 10) month = '0' + month;

                return `${day}/${month}/${year}`
            }
        }
    }
</script>

<style lang="scss" scoped>
.sc-card{
    width: calc(100% / 5 - 20px);
    min-height: 400px;
    max-height: 450px;
    margin: 10px 5px;
    padding: 10px;
    text-decoration: none;
    color: black;
    &:hover{
    box-shadow: 2px 2px 20px  black;
    border-radius: 10px;
    transition: all .3s;
    }
    .text-card{
        text-decoration: none;
        color: black;
    }
    .img-card{
        height: 40%;
    }
    img{
        border-radius: 20px;
    }
}
</style>

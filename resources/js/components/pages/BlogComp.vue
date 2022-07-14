<template>
    <div class="container">
        <div v-if="isLoading" class="d-flex justify-content-center ">
            <LoaderComp/>
        </div>
        <div v-else>
            <h1>I miei post</h1>
            <PostItem
            v-for="post in posts"
            :key="post.id"
            :post="post"
             />
             <PaginationComp
             @getApi="getApi"
             @getApiUrlPages="getApiUrlPages"
             :pagination="pagination"
             />
        </div>
    </div>
</template>

<script>
import Axios from 'axios'
import PostItem from '../partials/PostItem.vue'
import PaginationComp from '../partials/PaginationComp.vue'
import LoaderComp from '../partials/LoaderComp.vue'

    export default {
    name: "BlogComp",
    data() {
        return {
            apiUrl: "/api/posts/?page=",
            posts: null,
            pagination: {
                current:null,
                last:null,
                nextUrl:null,
                prevUrl:null,
                lastUrl:null,
                firstUrl:null
            },
            isLoading: true
        };
    },
    mounted() {
        this.getApi(1);
    },
    methods: {
        getApi(page) {
            Axios.get(this.apiUrl +  page)
                .then(r => {
                this.posts = r.data.data;
                this.pagination = {
                    current: r.data.current_page,
                    last: r.data.last_page,
                    nextUrl: r.data.next_page_url,
                    prevUrl: r.data.prev_page_url,
                    }
                if(this.posts.length > 1) this.isLoading = false;
            });
        },
        getApiUrlPages(apiUrlPages) {
            Axios.get(apiUrlPages)
                .then(r => {
                this.posts = r.data.data;
                this.pagination = {
                    current: r.data.current_page,
                    last: r.data.last_page,
                    nextUrl: r.data.next_page_url,
                    prevUrl: r.data.prev_page_url,
                    }
                if(this.posts.length > 1) this.isLoading = false;


            });
        }
    },
    components: { PostItem, PaginationComp, LoaderComp }
}
</script>

<style lang="scss" scoped>

</style>

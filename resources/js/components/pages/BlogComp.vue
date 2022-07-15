<template>
    <div class="container">

        <div v-if="!posts" class="d-flex justify-content-center ">
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
import { apiUrl } from '../../data/config'

    export default {
    name: "BlogComp",
    data() {
        return {
            apiUrl,
            posts: null,
            pagination: {
                current:null,
                last:null,
                nextUrl:null,
                prevUrl:null,
                lastUrl:null,
                firstUrl:null
            },
            categories: [],
            tags: []
        };
    },
    mounted() {
        this.getApi(1);
    },
    methods: {
        getApi(page) {
            this.posts = null;
            Axios.get(this.apiUrl + '/' + '?page=' + page)
                .then(r => {
                this.posts = r.data.posts.data;
                this.pagination = {
                    current: r.data.posts.current_page,
                    last: r.data.posts.last_page,
                    nextUrl: r.data.posts.next_page_url,
                    prevUrl: r.data.posts.prev_page_url,
                    }
                this.categories = r.data.categories;
                this.tags = r.data.tags;
            });
        },
        getApiUrlPages(apiUrlPages) {
            this.posts = null;
            Axios.get(apiUrlPages)
                .then(r => {
                this.posts = r.data.posts.data;
                this.pagination = {
                    current: r.data.posts.current_page,
                    last: r.data.posts.last_page,
                    nextUrl: r.data.posts.next_page_url,
                    prevUrl: r.data.posts.prev_page_url,
                    }
                this.categories = r.data.categories;
                this.tags = r.data.tags;
            })
        }
    },
    components: { PostItem, PaginationComp, LoaderComp }
}
</script>

<style lang="scss" scoped>

</style>

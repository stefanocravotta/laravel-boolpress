<template>
    <div class="container" >

        <div v-if="!posts" class="d-flex justify-content-center ">
            <LoaderComp/>
        </div>

        <div class="py-3 d-flex flex-column align-items-center" v-else>
            <h1 class="text-center py-3">I miei post {{searchType}}</h1>
            <div class="d-flex justify-content-center flex-wrap">
            <PostItem
            v-for="post in posts"
            :key="post.id"
            :post="post"
             />
            </div>
             <PaginationComp
             @getApi="getApi"
             @getApiUrlPages="getApiUrlPages"
             :pagination="pagination"
             class="py-5"
             />
        </div>
        <SideBarComp
        :categories="categories"
        :tags="tags"
        @searchPostsByCategory="searchPostsByCategory"
        />


    </div>
</template>

<script>
import Axios from 'axios'
import PostItem from '../partials/PostItem.vue'
import PaginationComp from '../partials/PaginationComp.vue'
import LoaderComp from '../partials/LoaderComp.vue'
import { apiUrl } from '../../data/config'
import SideBarComp from '../partials/SideBarComp.vue'

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
            tags: [],
            searchType: ''
        };
    },
    mounted() {
        this.getApi(1);
    },
    methods: {
        getApi(page) {
            this.posts = null;
            this.searchType = '';
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
        },
        searchPostsByCategory(slug_category){
            Axios.get(this.apiUrl + '/post-category/' + slug_category)
            .then(r => {
                this.posts = r.data.posts
                this.searchType = r.data.name;
            })
        },
        /* searchPostsByTag(slug_tag){
            Axios.get(this.apiUrl + '/post-tag/' + slug_tag)
            .then(r => {
                this.posts = r.data.posts
                this.searchType = r.data.name;
            })
            .catch(e =>{
                console.log(e);
            })
        } */
    },
    components: { PostItem, PaginationComp, LoaderComp, SideBarComp }
}
</script>

<style lang="scss" scoped>

</style>

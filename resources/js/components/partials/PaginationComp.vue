<template>
    <div>
        <!-- PAGINATION -->
        <button
        @click="$emit('getApi' , 1)"
        :disabled="pagination.current === 1"
         class="btn btn-dark">
        <<
        </button>

        <button
        @click="$emit('getApiUrlPages', pagination.prevUrl )"
        :disabled="pagination.current === 1"
        class="btn btn-dark">
        <
        </button>

        <button
        v-for="i in pagination.last"
        :key="i"
        @click="$emit('getApi' , i)"
        :disabled="pagination.current === i"
        class="btn">{{i}}</button>

        <button
        @click="$emit('getApiUrlPages', pagination.nextUrl )"
        :disabled="pagination.current === pagination.last"
        class="btn btn-dark">
        >
        </button>

        <button
        @click="$emit('getApi' , pagination.last )"
        :disabled="pagination.current === pagination.last"
         class="btn btn-dark">
        >>
        </button>
        <!-- /PAGINATION -->
    </div>
</template>

<script>
    export default {
        name: 'PaginationComp',
        data() {
            return {

            }
        },
        props: {
            pagination : Object
        },
        mounted() {

        },
    }
</script>

<style lang="scss" scoped>

</style>

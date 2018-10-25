<template>

        <div class="row">
            <Category v-for="category in board.categories" :key="category.id" :thisCategory="category" :board="board"/>
        </div>

</template>

<script>
import Category from './Category.vue'

    export default {
        name: 'Board',
        components: {
            Category,
        },
        props: {
            board: Object
        },
        data() {
            return {
                someVar: "Some Variable",
            }
        }
    }

</script>


<style>

</style>
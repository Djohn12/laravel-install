<template>

        <div class="row px-3">
            <Category v-for="category in board.categories" :key="category.id" :thisCategory="category" :board="board"/>
        </div>

</template>

<script>
import boards from '@/json/boards.json'

import Category from '@/components/Category.vue'

    export default {
        name: 'Board',
        components: {
            Category,
        },
        props: {
            
        },
        data() {
            return {
                someVar: "Some Variable",
                board: boards[0]
            }
        }
    }

</script>


<style>

</style>
<template>
    <div>

            <div>
                <b-button variant="outline-primary" @click="show_category_panel">New Category</b-button>
            </div>
            <div v-if="category_panel">
                <b-input-group class="col-5 mx-auto">
                    <b-form-input @keydown.enter="add_category()" v-model="category_name" type="text" class="form-control" placeholder="Enter your new category name"></b-form-input>
                    <b-input-group-append>
                    <b-button variant="outline-primary" @click="add_category()">Add new category</b-button>
                    </b-input-group-append>
                </b-input-group>
            </div>

        <div class="row px-3">
            <Category v-for="category in board.categories" :key="category.id" :thisCategory="category" :board="board"/>
        </div>

    </div>   
</template>

<script>
import boards from '../json/boards.json'

import Category from './Category.vue'

    export default {
        name: 'Board',
        components: {
            Category,
        },
        props: {
            
        },
        data() {
            return {
                category_panel: false,
                category_name: '',
                board: boards[0]
            }
        },
        methods: {
            show_category_panel(){
                this.category_panel = !this.category_panel
            },
            add_category() {
                let title = this.category_name;
                let data = {
                    'title': title,
                    'board_id': this.board.id
                }
                // ajax call to the api route
                window.axios.post('api/categories/store', {data})
                .then(response => {
                    console.log('response')
                    console.log(response)
                    console.log('response.data')
                    console.log(response.data)

                    this.board.categories.push(response.data.new_category)
                    console.log('this.board.categories')
                    console.log(this.board.categories)
                });
                this.category_name = ''
                this.category_panel = false
            }
        }
    }

</script>


<style>

</style>
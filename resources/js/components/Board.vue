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
            <Category v-for="category in board.categories" :key="category.id" :thisCategory="category" :links="board.links"/>
        </div>

    </div>   
</template>

<script>
import boards from '../json/boards.json'

import Category from './Category.vue'

    export default {
        name: 'Board',
        components: {
            Category
        },
        props: {
            
        },
        data() {
            return {
                category_panel: false,
                category_name: '',
                board_id: 1,
                board: {
                    categories: [],
                    links: boards[1].links
                },
            }
        },
        created(){

            window.axios.get(`api/categories/get`)
            .then(response => this.board.categories = response.data.categories );
        },
        methods: {
            show_category_panel(){
                this.category_panel = !this.category_panel
            },
            get_categories() {

            },
            add_category() {

                let data = {
                    'title': this.category_name,
                    'board_id': this.board_id
                }
                console.log(data)
                // ajax call to the api route
                window.axios.post('api/categories/store', {data})
                .then(response => {
                    this.board.categories = response.data.categories;
                });
                // On remet les inputs à zéro
                this.category_name = ''
                this.category_panel = false
            },
    		destroy_category() {
    			let name = this.category_name_to_edit;
    			let id;
    			// map through categories_list to get id of the selected category
    			this.categories_list.map( x => {
    				if(x.name == name ){
    					return id = x.id;
    				}
    			});
    			// send post request to api route with the category's id
       			window.axios.post('api/categories/destroy', {id})
       			.then(response => console.log(response.data.message))
       			.then( () => this.categories_list = this.categories_list.filter( x => x.id != id) );
    		}
        }
    }

</script>


<style>

</style>

<template>

  <div id="app">

    <!--<Navbar title="Simple Navbar"/>-->
    <div>
      <b-button variant="outline-primary" @click="show_board_panel">New Board</b-button>
      <b-button variant="outline-primary" @click="show_category_panel">New Category</b-button>
    </div>
    <div v-if="board_panel">
      <b-input-group class="col-5 mx-auto">
        <b-form-input v-model="board_name" type="text" class="form-control" placeholder="Enter your new board name"></b-form-input>
        <b-input-group-append>
          <b-button variant="outline-primary" @click="add_board()">Add new board</b-button>
        </b-input-group-append>
      </b-input-group>
    </div>
    <div v-if="category_panel">
      <b-input-group class="col-5 mx-auto">
        <b-form-input v-model="category_name" type="text" class="form-control" placeholder="Enter your new category name"></b-form-input>
        <b-input-group-append>
          <b-button variant="outline-primary" @click="add_category()">Add new category</b-button>
        </b-input-group-append>
      </b-input-group>
    </div>
    <Board/>
    
  </div>
  
</template>

<script>
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import Navbar from './Navbar.vue'
import Board from './Board.vue'



export default {
  name: 'app',
  components: {
    Navbar,
    Board,
  },
  data(){
    return {
      board_panel: false,
      category_panel: false,
      board_name: '',
      message_text: 'If some variable is false... You will not see this',
      message: false
    }
  },
  methods: {
    show_board_panel(){
      return this.board_panel = !this.board_panel
    },
    show_category_panel(){
      this.category_panel = !this.category_panel
    },
    add_board() {
      let name = this.board_name;
      let data = {
        'name': name,
        'user_id': currentUser 
      }
      // ajax call to the api route
      window.axios.post('api/boards/store', {data});
      this.board_name = ''
      this.board_panel = false
    },
    add_category() {
      let name = this.category_name;
      let data = {
        'name': name,
      }
      // ajax call to the api route
      window.axios.post('api/categories/store', {data});
      this.category_name = ''
      this.category_panel = false
    }
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  // margin-top: 60px;
}

a, a:active {
  color: grey;
}
a:hover {
  color: lightgrey;
}
</style>

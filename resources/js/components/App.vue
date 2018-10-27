
<template>

  <div id="app">

    <!--<Navbar title="Simple Navbar"/>-->
    <div>
      <b-button variant="outline-primary" @click="show_board_panel">New Board</b-button>
    </div>
    <div v-if="board_panel">
      <b-input-group class="col-5 mx-auto">
        <b-form-input v-model="board_name" type="text" class="form-control" placeholder="Enter your new board name"></b-form-input>
        <b-input-group-append>
          <b-button variant="outline-primary" @click="add_board()">Add new board</b-button>
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
      board_name: '',
      message_text: 'If some variable is false... You will not see this',
      message: false
    }
  },
  methods: {
    show_board_panel(){
      return this.board_panel = !this.board_panel
    },
    add_board() {
      // ajax call to the api route
      window.axios.post('api/boards/store')
        .then(() => { this.boards.push(new Board());})
        .then(console.log(this.board_name));
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

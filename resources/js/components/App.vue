
<template>

  <div id="app">

    <!--<Navbar title="Simple Navbar"/>-->
    <div>
      <b-btn size="sm" variant="outline-primary" @click="board_panel = !board_panel">New Board</b-btn>
    </div>
    <div v-if="board_panel">
    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
      <input @keydown.enter="add_board()" v-model="board_name" type="text" class="form-control" placeholder="Enter your new board name"/>
    </div>
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
    show(){
      return this.board_pannel = !this.board_panel
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

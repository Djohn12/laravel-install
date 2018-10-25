
<template>

  <div id="app">

    <Navbar title="Simple Navbar"/>

    <Board :board="board"/>
    
  </div>
  
</template>

<script>
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import boards from '../json/boards.json'

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
      message_text: 'If some variable is false... You will not see this',
      message: false,
      board: boards[0]
    }
  },
  methods: {
    show(){
      this.message = !this.message
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


<template>

  <div id="app">

    <Navbar title="Simple Navbar"/>

    <Board/>
    
  </div>
  
</template>

<script>
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import Navbar from '@/components/Navbar.vue'
import Board from '@/components/Board.vue'



export default {
  name: 'app',
  components: {
    Navbar,
    Board,
  },
  data(){
    return {
      message_text: 'If some variable is false... You will not see this',
      message: false
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

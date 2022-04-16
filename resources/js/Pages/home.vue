<template class="min-h-screen bg-slate-300">
     <div>
        <Nav></Nav>
      
       <Header></Header>
       <Ppost></Ppost>
       <Pusers></Pusers>
       <posts></posts>
      </div>
</template>

<script>

import Nav from "../Shared/Nav"
import Header from "../Shared/Header"
import Ppost from "../Pages/Ppost"
import Pusers from "../Pages/Pusers"
import posts from "../Pages/posts"
export default {
  props:{
    freamworks:Array
  },
    components:{ Nav, Header, Ppost, Pusers, posts }
}
</script>

<style>

</style>
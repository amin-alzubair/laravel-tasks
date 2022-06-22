<template >
<Head>
    <title>Home</title>
</Head>
<div class="min-h-screen bg-slate-300">
       <Nav></Nav>
       <Header></Header>
       <Ppost></Ppost>
       <Pusers :users="users"></Pusers>
       <Posts :posts="posts"></Posts>
</div>
     
</template>

<script>

import Nav      from  "../Shared/Nav"
import Header   from  "../Shared/Header"
import Ppost    from  "../Pages/Posts/Ppost.vue"
import Pusers   from  "../Pages/Pusers"
import Posts    from  "../Pages/Posts/Posts.vue"
import { Head } from "@inertiajs/inertia-vue3"
 
export default {
    props:{
        posts:Array,
        users:Object
    },
    components:{ Nav, Header, Ppost, Pusers, Posts, Head }
}
</script>

<style>

</style>
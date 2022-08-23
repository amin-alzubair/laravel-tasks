<template>
    <div class="grid  md:grid-cols-3 xl:grid-cols-3 lg:grid-cols-4 sm:grid-cols-1">
        <!-- start-->
          <div class="inline-flex bg-gray-800 shadow-md rounded-md  ml-2 mb-2 text-orange-400 space-x-3" v-for="user of users" :key="user.id">
            <img :src='"https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80"' alt="User image" srcset="" class="h-16 w-16 rounded-full justify-start p-2">
            <div class="mt-6 text-gray-300 space-x-3">
              <span class="ml-4"><Link :href="'/show-profile/'+user.id">{{user.name}}</Link></span>
              <span class="ml-4">{{user.friendCount}} friends</span>
              <span class="ml-4">{{user.postCount}} Posts</span>
            </div>
        </div>
         
    </div>
         <!-- end-->
    
</template>

<script>
import {  Link }  from "@inertiajs/inertia-vue3"
export default {
   props:{ users:Object },
   components:{ Link }
}
</script>

<style>

</style>
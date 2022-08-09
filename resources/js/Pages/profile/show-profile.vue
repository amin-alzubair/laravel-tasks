<template>
<Head>
<title> Profile-{{user.name}} </title>
</Head>
  <Nav></Nav>
  <div class="flex justify-center bg-violet-900">
    <img :src="'/storage/users-avatar/'+user.avatar" alt="" class="h-32 w-32 items-center my-3 rounded-md bg-cover">
  </div>
  <div class="flex items-center justify-center space-x-4">
      <h1 class="text-gray-500 font-semibold text-xl">{{user.name}}</h1>
      <friendable :user="user"></friendable> 
    </div>
    <h2 class="mx-4 p-3 text-gray-800" v-show="user.getFriendsCount">({{user.getFriendsCount}}) Friends</h2>
    <div  class="flex items-center">
    <div v-for="friend in user.friends" :key="friend">
        <div  class="text-gray-500">
          <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80" class="h-16 w-16 items-center p-2 mx-2 rounded-full">
            <span class="mx-4"><Link :href="'/show-profile/'+friend.id">{{friend.name}}</Link></span>
        </div>
    </div>
    </div>
    <div class="mx-6 p-4">

    <Link class="text-violet-700  underline" v-show="user.getFriendsCount > 4" :href="'/get-friends/'+user.id">See more</Link>
    </div>
    <div class="bg-slate-300">

      <Posts :posts="posts"></Posts>
    </div>
</template>

<script>
import  Nav from "../../Shared/Nav"
import { Head, Link } from "@inertiajs/inertia-vue3" 
import Posts from '../Posts/Posts.vue'
import Friendable from './Friendable.vue'
export default {
   components:{ Nav, Head, Posts ,Friendable, Link},
   props:{ user:Object , posts:Object }
}
</script>

<style>

</style>
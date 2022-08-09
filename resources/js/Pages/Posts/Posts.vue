<template>
  <section><!--section of articles-->
    <div class="grid md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-3 sm:grid-cols-1">
        <div class="mt-4 mx-4 my-2 p-2  bg-white shadow-md rounded-lg" v-for="post of  posts" :key="post.id">
            <img :src='"https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80"' alt="User image" v-if="post.avatar" srcset="" class="h-16 w-16 rounded-full justify-start border-2 border-violet-700">
            <span class="text-gray-500"><Link :href="'/show-profile/'+post.userid" v-if="post.username">{{post.username}}</Link></span>

            <p class="text-gray-700 mt-3">
                <Link :href="'/posts/'+post.id">
                {{post.body.substr(0,100)}}...
                </Link>
            </p>

            <div class="flex  my-2 p-2 space-x-3">
                <span :class="post.isLikedBy ? 'text-red-600 text-sm mt-3' :'text-violet-700 text-sm mt-3'"><i class="fa fa-clock"></i>{{post.publish_at}}</span>
                <span :class="post.isLikedBy ? 'text-red-600 text-sm mt-3' :'text-violet-700 text-sm mt-3'"><Link :href="'/star/'+post.id" preserve-scroll><i class="fa fa-heart ml-10"></i></Link>{{post.likersCount}}</span>
            </div>
          </div>
    </div> 
  </section><!-- end section of articles-->
</template>

<script>

import { Link } from "@inertiajs/inertia-vue3"
export default {
    components:{ Link },
    
    props:{
        posts:Object
    },
}
</script>

<style>

</style>
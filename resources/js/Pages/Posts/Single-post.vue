<template>
<Head>
  <title>Single Post</title>
</Head>
  <Nav></Nav>
 <section><!--section of articles-->
        <div class="mt-4 mx-4 my-2 p-2 items-center">
            <img :src="'/storage/users-avatar/'+post.useravatar" alt="User image" srcset="" class="h-16 w-16 rounded-full justify-start border-2 border-violet-700">
            <Link :href="'/show-profile/'+post.userid" :class="'text-gray-500'">{{post.username}}</Link>

            <p class="text-gray-800 mt-3">
                {{post.body}}
                
            </p>
            <div class="flex  my-2 p-2 space-x-3">
                <span :class="post.isLikedBy ? 'text-red-600 text-sm mt-3' :'text-violet-700 text-sm mt-3'"><i class="fa fa-clock"></i>{{post.publish_at}}</span>
                <span :class="post.isLikedBy ? 'text-red-600 text-sm mt-3' :'text-violet-700 text-sm mt-3'"><Link :href="'/star/'+post.id"><i class="fa fa-heart ml-10"></i></Link>{{post.likersCount}}</span>
               </div>
         </div> 
  </section>
</template>

<script>
import Nav from "../../Shared/Nav";
import { Head } from "@inertiajs/inertia-vue3";
import { Link } from  "@inertiajs/inertia-vue3"
export default {
  props:{ post:Object },
  components:{ Nav , Head, Link }

}
</script>

<style>

</style>
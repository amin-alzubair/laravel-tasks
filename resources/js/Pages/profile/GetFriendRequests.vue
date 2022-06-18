<template>
<Head title="All Friends"></Head>
<Nav></Nav>
  <div>
    <div class="max-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
      <div  class="w-full sm:max-w-md mt-6 my-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">  
           <div  class="flex px-2 py-2 mx-6 text-gray-600  text-sm font-semibold" v-show="friends.length < 1">
                   <span>No Friends yet!</span>
            </div>
          <div v-for="friend in friends" :key="friend">
            
              <div class="flex  mx-6 space-x-3">
                <img :src="'/storage/users-avatar/'+friend.avatar" alt="" class="h-16 w-16 items-center rounded-full">
                <span class="text-gray-600 mx-4 my-4"><Link :href="'/show-profile/'+friend.sender_id">{{friend.sender_name}}</Link></span>
                
               <Link :href="'/accept-friend?user_id='+friend.sender_id" preserve-scroll class="bg-navColor px-1 py-1 text-white rounded  text-sm"  method="post"  as="button"><i class="fa fa-plus mr-2"></i>Accept</Link>
               <Link :href="'/deny-friend?user_id='+friend.sender_id" preserve-scroll   class="bg-red-500 px-1 py-1 text-white rounded  text-sm"  method="post"  as="button"><i class="fa fa-trash mr-2"></i>Remove</Link>
      
                </div>
                
              </div>
              
          </div>    
      </div> 
     </div>
</template>

<script>
import Nav from '../../Shared/Nav.vue'
import { Link, Head } from '@inertiajs/inertia-vue3'
export default {
   props: { friends:Array },
   components: { Nav, Link, Head },
}
</script>

<style>

</style>
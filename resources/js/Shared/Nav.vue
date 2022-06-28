<template>
  <header class="bg-navColor  w-full  rounded-sm shadow-md  sm:flex sm:justify-between sm:items-center sm:px-4 sm:py-3">
    <div class="max-w-7xl  px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex">
          <div class="shrink-0 flex items-center">
             <navLink href="/">
             <img class="block h-10 w-auto fill-current text-white" src="/img/logo-inverted.svg" alt="Workcation">
           </navLink>
   
          </div>
      </div>
      
      <div class="sm:hidden">
        <button @click="isOpen = !isOpen" type="button" class="block text-white hover:text-white focus:text-white focus:outline-none">
          <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path v-if="isOpen" fill-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
            <path v-if="!isOpen" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
          </svg>
        </button>
      </div>
      </div>
    </div>
    
    <nav :class="isOpen ? 'block' : 'hidden'" class="px-2 py-2 pb-4 sm:flex sm:p-0">
      <div v-if="$page.props.auth.user" class="flex justify-center items-center mt-0">
        
          <div class="inline-flex justify-between space-x-3 mx-3" >
          <a :href="'/messenger'" class="text-white"><span class="h-5 w-5  rounded-full bg-red-500 text-white" v-show="$page.props.unreadMessageCount">{{$page.props.unreadMessageCount}}</span><i class="fa fa-message fa-xl text-white"></i></a>
          <Link :href="'/get-friend-requests'" class="text-white"><span class="h-5 w-5  rounded-full bg-red-500 text-white" v-show="$page.props.friendrequestcount">{{$page.props.friendrequestcount}}</span><i class="fa fa-user-plus fa-xl"></i></Link>
          <a class=" text-white"><i class="fa fa-bell fa-xl"></i></a>
          </div>
       
    </div>
      <navLink href="/register" :active="$page.component==='register'" v-if="!$page.props.auth.user">register</navLink>
      <navLink href="/login" :active="$page.component==='login'" v-if="!$page.props.auth.user">login</navLink> 
      
     <div v-if="$page.props.auth.user" class="flex justify-center items-center">
        <div id="dropdown">
         <dropdown class="mt-1" placement="bottom-end" >
              <template #default>
                <div class="group flex items-center cursor-pointer select-none">
                  <i class="fa-solid fa-angle-down fa-lg text-white"></i>
                </div>
              </template>
              <template #dropdown>
                <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">
                  <Link class="block px-6 py-2 hover:text-white hover:bg-indigo-500" :href="`/my-profile/edit`">My Profile</Link>
                  <Link class="block px-6 py-2 hover:text-white hover:bg-indigo-500" href="/users">Manage Users</Link>
                  <Link class="block px-6 py-2 w-full text-left hover:text-white hover:bg-indigo-500" href="/logout" method="post" as="button">Logout</Link>
                </div>
              </template>
            </dropdown>
       </div>
        <img :src="'/storage/users-avatar/'+$page.props.auth.user.avatar" alt=""  class="h-16 w-16 rounded-full justify-start p-2">
      </div>
    </nav>
  </header>
     
</template>

<script>
import navLink from "../Shared/NavLink"
import Dropdown from "../Shared/Dropdown"
import {  Link  } from '@inertiajs/inertia-vue3'
import icon from '../Shared/Icon'

export default {

  props:{name:String},
  components:{navLink, Dropdown, Link,icon},
  data() {
    return {
      isOpen: false,
    }
  },

  created(){

    if(this.$page.props.auth.user){
      window.Echo.private(`App.Models.User.${this.$page.props.auth.user.id}`)
    .notification((notification) => {

      switch(notification.type){
        case 'App\\Notifications\\SendFriendRequestNotification':
                  this.$page.props.friendrequestcount++;
          break;

          case 'App\\Notifications\\SendMessages':
                  this.$page.props.unreadMessageCount++;
          break;
      }
    });
    }
  }
}
</script>
<template>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
  <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">  
  
<form @submit.prevent="submit" class="flex flex-col items-center space-x-6" enctype="multipart/form-data">
  <div class="flex flex-row justify-center">
  <div class="shrink-0">
    <img class="h-16 w-16 object-cover rounded-full" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80" alt="Current profile photo" />
  </div>
  <label class="block mt-4 ml-4">
    <span class="sr-only">Choose profile photo</span>
    <input type="file" class="block w-full text-sm text-slate-500
      file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-violet-700
      hover:file:bg-violet-100
    " name="image"/>
  </label>
  </div>

  <div class="mt-4 block w-full">
  <input type="text" name="countery" id="" v-model="form.countery" class="border-gray-300 rounded-md focus:bg-indigo-300 placeholder:text-sm placeholder:text-gray-500 focus:placeholder:text-violet-700 shadow-md" placeholder="Enter Your countery">
  </div>
  <div class="mt-4 block w-full">
    <input type="text" name="city" id="" v-model="form.city" class="border-gray-300 rounded-md focus:bg-indigo-300 placeholder:text-sm placeholder:text-gray-500 focus:placeholder:text-violet-700 shadow-md" placeholder="Enter your city"> 
  </div>
  <div class="mt-4 block w-full">
    <button class="bg-violet-50 py-2 px-4 rounded-xl text-violet-700 font-semibold hover:bg-violet-100">Update</button>
  </div>
  </form>
</div>
</div>
</template>

<script>
import  { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
export default {
  setup(){
    const form = reactive({
        countery:null,
        city:null
    })

    function submit(){
      Inertia.post('/update-profile', form)
    }

    return  {submit, form}
  }

}
</script>

<style>

</style>
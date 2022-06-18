<template>
  <Head :title="'My-profile'" />
  

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-3 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
          <flash-messeges :class="form.recentlySuccessful ? '':'hidden'"></flash-messeges>
          <form @submit.prevent="submit"> 
            <div>

            <label for="countery" class="block font-medium text-sm text-gray-700">countery</label>
              <input  type="text" v-model="form.countery" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200  focus:ring-opacity-50" />
            </div>

            <div class="mt-4">
              <label for="City" class="block font-medium text-sm text-gray-700">City</label>
              <input label="City" type="text" v-model="form.city" class="block mt-1  w-full  rounded-md  shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 "/>
            </div>

              <loading-button type="submit" :loading="form.processing" :isDirty="!form.isDirty" class="mt-4">
                      update
                  </loading-button >
              
               </form>
        </div>
  </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3'
import LoadingButton from '../../Shared/LoadingButton'
import FlashMesseges from '../../Shared/FlashMesseges.vue'
export default {
   props:{ profile:Object },
   components:{ 
     Head,
     LoadingButton,
      FlashMesseges
     },

    data(){
      return {
        form : this.$inertia.form({
          countery:this.profile.countery,
          city:this.profile.city
        })
      }
      
    },

    methods: {
      submit(){
        this.form.post('/update-profile',{preserveScroll:true})
      }
    }
    
}
</script>

<style>

</style>
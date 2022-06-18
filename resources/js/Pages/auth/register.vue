<template>
<Head :title="'register'"></Head>
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
  <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">  
   <form @submit.prevent="submit">
            
            <!-- Name -->
            <div>
                <label class="block font-medium text-sm text-gray-700" for="name" >Name</label>

                <input id="name" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" v-model="form.name" required/>
                <div  class="text-red-600 mt-2 txet-sm" v-if="errors.name">{{errors.name}}</div>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700 " for="email" >E-mail</label>

                <input id="email" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="email"  v-model="form.email" required   />
                <div class="mt-2 text-red-600 text-sm" v-if="errors.email">
                    {{errors.email}}
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="password">Password</label>

                <input id="password" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="password"
                                v-model="form.password"
                                 autocomplete="new-password" required/>
                                 <div class="mt-2 text-red-600 text-sm" v-if="errors.password">
                                     {{errors.password}}
                                 </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="password_confirmation" >Confirm Password</label>

                <input id="password_confirmation" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="password"
                                v-model="form.password_confirmation" required  />
                                <div class="mt-2 text-red-600 text-sm">
                                    {{errors.password_confirmation}}
                                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="'/login'" class="underline text-sm text-gray-600 hover:text-gray-900">
                    Already registered?
                </Link>

                <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Register
                </button>
            </div>
        </form>
</div>

</div>

        <!-- Validation Errors -->
        
</template>

<script>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'
export default {
    components:{ Head, Link },
    props:{errors:Object},
    setup(){
       const form = reactive({
           name:null,
           email:null,
           password:null,
           password_confirmation:null
       })

       function submit ()
       {
           Inertia.post('/register', form)
       }

       return { form, submit }
    },

}
</script>

<style>

</style>
<template>
  <Head :title="'Login'"></Head>
  <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
      <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
          <form @submit.prevent="submit">

              <div>
                <label for="E-mail" class="block font-medium text-sm text-gray-700">E-mail</label>
                <input type="email" v-model="form.email" id="" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                <div class="mt-2 text-red-600 text-sm" v-if="errors.email">{{errors.email}}</div>
              </div>

              <!--Password-->
              <div class="block mt-4">

                <label for="E-mail" class="block font-medium text-sm text-gray-700">Password</label>
                <input type="password" v-model="form.password" id="" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                <div class="mt-2 text-red-600 text-sm" v-if="errors.password">{{errors.password}}</div>
              </div>

              <!--Remember my-->
              <div class="block mt-4">
                  <label for="" class="inline-flex items-center">
                       <input type="checkbox" name="remember" id="" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                       <span class="ml-2 text-sm  text-gary-600">Remember my</span>
                  </label>
              </div>

              <div class="flex items-center justify-end mt-4">
                      <a class="underline text-sm text-gray-600 hover:text-gray-900" href="#">
                        Forgot your password?
                    </a>
                   <loading-button type="submit" :loading="form.processing">
                      Login
                  </loading-button >
              </div>
            </form>
      </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import LoadingButton from '../../Shared/LoadingButton.vue'
export default {
    components:{ Head, Link ,LoadingButton },
    props:{errors:Object},

    data(){
        return { 
            form : this.$inertia.form({
            email:'',
            password:'',
            remember:false
        })
        }
    },
        methods: { 
            submit(){
            this.form.post('/login')
        }
        }
    }
</script>

<style>

</style>
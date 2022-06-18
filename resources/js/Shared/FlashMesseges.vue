<template>
  <div>
      <div v-if="$page.props.flash.message && show"  class="flex items-center justify-between mb-8 max-w-3xl bg-green-500 rounded">
        <div class="flex items-center">
          
          <div class="py-4 px-4 text-white text-sm font-medium mx-5"><i  class="fa fa-check text-white"></i> {{$page.props.flash.message}}</div>

        </div>
        <button class="group mr-2" @click="show = false">
          <i class="fa fa-close text-white"></i>
        </button>

      </div>

  </div>
</template>

<script>
export default {
  data(){
    return {
      show:true,
    }
  },
watch:{
  '$page.props.flash': {
    handler(){
      this.show=true
    },
    deep:true,
    
  },
}

}
</script>

<style>

</style>
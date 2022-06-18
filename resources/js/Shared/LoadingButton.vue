<template>
  <button :disabled="loading || isDirty" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
      <div v-if="loading" class="animate-spin mr-2"><i class="fa fa-refresh"></i></div>
      <slot />
  </button>
</template>

<script>
export default {

    props:{
        loading:Boolean,
        isDirty:Boolean
    }

}
</script>

<style>

</style>
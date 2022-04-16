<template>
<Link class="mt-1 block px-2 py-1 text-white font-semibold rounded hover:bg-gray-800" :class="{'font-bold underline':active}">
    <slot />
</Link>
   
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
export default {
    components:{Link},
     props:{
         active:Boolean
     }
  
}
</script>

<style>

</style>
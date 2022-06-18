<template>
<div :class="$attrs.class">
  <label v-if="label" :for="id" class="block font-medium text-sm text-gray-700">{{label}}:</label>
  <input  :id="id" ref="input"  v-bind="{...$attrs, class: null}" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 form-input" :class="{error: error}" :type="type"  :value="modelValue" @input="$emit('upadte:modelValue', $event.target.value)"/>
  <div v-if="error" class="text-red-600">{{error}}</div>
</div>
</template>

<script>
import { v4 as uuid } from 'uuid'
export default {
  inheritAttrs:false,
  props:{
    id:{
      type:String,
      default(){
        return `text-input-${uuid()}`
      }
    },
    type:{
      type:String,
      default:'text'
    },
  
  error:String,
  label:String,
  modelValue:String,
  },
  emits: [
    'padte:modelValue'
  ],
  methods: {
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
    setSelectionRange() {
      this.$refs.input.setSelectionRange(start, end)
    },
  },
}

</script>

<style>

</style>
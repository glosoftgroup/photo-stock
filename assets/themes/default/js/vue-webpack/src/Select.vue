<template>
 <select multiple="multiple" data>
    <slot></slot>
 </select>
</template>

<script>
import select2 from 'select2'

export default {
  name: 'Select',   
  props: ['options', 'value','placeholder'],
  mounted: function () {
    var vm = this
    $(this.$el)
      // init select2
      .select2({ 
        data: this.options, 
        width:'100%',
        tags: true,
        dropdownCssClass: 'border-primary',
        containerCssClass: 'border-primary text-primary-700',
        tokenSeparators: [",", " "],
        placeholder:'Select' })
      .val(this.value)
      .trigger('change')
      // emit event on change.
      .on('change', function () {
        vm.$emit('input', this.value)
      })
  },
  watch: {
    value: function (value) {
      // update value
      // console.log(value);
      $(this.$el).val(value)
    },
    options: function (options) {
      // update options
      $(this.$el).select2({
        data: options,
        tags: true,
        dropdownCssClass: 'border-success',
        containerCssClass: 'border-success text-success-700',
        tokenSeparators: [",", " "],
        placeholder:'Select categories'
      })
    }
  },
  destroyed: function () {
    $(this.$el).off().select2('destroy')
  }
}
//./select
</script>

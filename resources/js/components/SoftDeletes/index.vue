<template>
   <div>
      SOFTDELETES
   </div>
</template>
<script>
   export default {
      data() {
         return {
            gadgets: null
         }
      },
      created() {
         this.getGadgets()
      },
      methods: {
         getGadgets() {
            console.log('Gadgets')
         }
      }
   }
</script>
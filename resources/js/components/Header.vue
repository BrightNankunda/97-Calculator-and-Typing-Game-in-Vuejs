<template>
  <div class="container col-md-7">
    <h1 class="text-primary text-center">CALCULATOR IN VUE JS</h1>
    {number}
    <button @click="append()" class="btn btn-primary bright">Button</button>
  </div>
</template>
<script>
export default {
  name: "header",
};
data() {
  return {
    number: ''
  }
}
methods: {
  append() {
    return this.number = 10
  }
}
</script>

<style scoped>
*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.container {
  max-width: 80%;
}
</style>

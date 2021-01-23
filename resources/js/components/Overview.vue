<template>
  <div class="col-md-12 col-lg-6 mx-auto over">
    <h3 class="text-center">Current Bytes</h3>
    <div class="text-center bytes">{{ bytes }}</div>
    <div class="text-center bps">Bytes Per Second: {{ bps }}</div>
    <div class="text-center level">Current Level: {{ level }}</div>
    <div class="text-center next-level">Bytes Until Next Level: {{ bytesUntilLevelUp }}</div>
  </div>
</template>
<script>
export default {
  name: "overview",
  computed: {
    bytes() {
      return Math.round(this.$store.state.bytes);
    },
    bps() {
      return this.$store.state.bps.toFixed(1);
    },
    level() {
      return this.$store.state.player.level;
    },
    bytesUntilLevelUp() {
      return this.$store.getters.bytesUntilLevelUp;
    },
  },
};
</script>
<style scoped>
.over {
  margin: 20px;
  background: #b8cbda;
  max-width: 80%;
  max-height: 55vh;
  border: 2px solid #dc2db8;
  border-radius: 10px;
  color: #0940ce;
  font-size: 1.3em;
  display: flex;
  justify-content: center;
  flex-direction: column;
  padding: 10px;
}
h3 {
  color: #222;
}
.bytes {
  font-size: 40px;
  font-weight: 500px;
  width: 200px;
  padding: 9px 15px;
  background: #8bdca1;
  border-radius: 5px;
  display: flex;
  justify-content: center;
  margin: 0 auto;
}
</style>

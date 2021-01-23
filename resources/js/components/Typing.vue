<template>
  <div id="game">
    <h1 class="text-center">Typing Game</h1>
    <Overview />
    <Upgrades />
  </div>
</template>
<script>
import Overview from "./Overview.vue";
import Upgrades from "./Upgrades.vue";
export default {
  name: "Typing",
  components: {
    Overview,
    Upgrades,
  },
  methods: {
    coding() {
      this.$store.commit("incrementBytes", this.$store.state.bpk);
    },
    loop() {
      //GAME LOOP
      this.$store.commit("bytesperSecond");
      this.levelManager();
      requestAnimationFrame(this.loop);
    },
    levelManager() {
      if (this.$store.getters.bytesUntilLevelUp <= 0) {
        this.$store.commit("levelUp");
      }
    },
  },
  created() {
    this.loop();
    window.addEventListener("keypress", this.coding);
  },

  destroyed() {
    window.removeEventListener("keypress", this.coding);
  },
};
</script>
<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: sans-serif;
  background: green;
}
#game {
  height: 100vh;
  background: green;
}
</style>

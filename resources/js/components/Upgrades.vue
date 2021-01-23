<template>
  <div class="col-md-12 col-lg-6 mx-auto upgrades">
    <div v-for="(upgrade, index) in upgrades" :key="index" class="upgrade my-2 d-flex justify-content-center">
      <button class="btn btn-primary my-1 mx-2" :class="`button ${upgrade.disabled ? 'disabled' : ''}`" @click="() => buyUpgrade(index)">{{ upgrade.name }} {{ upgrade.disabled ? `(lvl: ${upgrade.unlocksAt})` : "" }}</button>
      <div class="details">
        <div class="cost">Cost: {{ upgrade.cost }}</div>
        <div class="quantity">Quantity: {{ upgrade.quantity }}</div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "upgrades",
  computed: {
    upgrades() {
      return this.$store.getters.availableUpgrades;
    },
  },
  methods: {
    buyUpgrade(index) {
      this.$store.commit("buyUpgrade", {
        index,
        amount: 1,
      });
    },
  },
};
</script>
<style scoped>
.upgrades {
  margin: 20px;
  background: #d90961;
  max-width: 80%;
  max-height: 55vh;
  border: 2px solid#D0DA06;
  border-radius: 10px;
  color: #0940ce;
  font-size: 1.3em;
  display: flex;
  justify-content: center;
  flex-direction: column;
  padding: 10px;
}
</style>

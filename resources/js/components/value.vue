<template>
<div>
    {{value}}
</div>
</template>

<script>
export default {
    name: 'value',

    computed: {
        value() {
            return this.$store.getters.value
        }
    }
}
</script>

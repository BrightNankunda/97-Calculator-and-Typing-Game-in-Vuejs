<template>
    <div class="hello">
        <h1>{{ msg }}, your id is {{ id }}</h1>
        <a style="cursor: pointer; text-decoration: underline" v-on:click="navigate()">Navigate to Page1</a>
    </div>
</template>

<script>

    export default {
        name: 'Bphones',
        data () {
            return {
                id: 0,
                msg: 'Hey Nic Raboy'
            }
        },
        created() {
            this.id = this.$route.params.id;
        },
        methods: {
            navigate() {
                router.go(-1);
            }
        }
    }
</script>

<style scoped>
    h1, h2 {
        font-weight: normal;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        display: inline-block;
        margin: 0 10px;
    }

    a {
        color: #42b983;
    }
</style>
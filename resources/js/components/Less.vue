<template>
<div class="container">
    <div v-for="last in lasts" :key="last.id">
        <div class="row">
            <div class="card col-lg-3">
                <img :src="'profile/' + last.pic" alt="pic" style="border-radius:50%;max-height=150px;">
                <div class="card-body">
                    <h4 class="lead">{{ last.name }}</h4>
                </div>
                <div class="card-footer">
                    <button @click="deleteLast(last)" class="btn  btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    mounted() {
        this.$store.dispatch('fetchLasts')
    },
    computed: {
        lasts() {
            return this.$store.getters.lasts
        }
    },
    methods: {
        deleteLast(last) {
            this.$store.dispatch('deleteLast', last)
        }
    }
}
</script>

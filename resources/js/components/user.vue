<template>
<div class="container">
    <div class="col-lg-10 mx-auto">
        <div class="row m-3">
            <div class="col-md-3 mt-3 profile">
                <div class="pic">
                    <img :src="'pic/' + user.profile" alt="profile pic" title="profile pic">
                </div>
            </div>
            <div class="mt-3 col-md-7 details">
                <div class="row m-2">
                    <button class="sm-btn btn-primary">Update details</button>
                </div>
                <div class="row p-2">Name: {{user.firstname + ' ' + user.lastname}}</div>
                <div class="row p-2">Email: {{user.email}}</div>
                <div class="row p-2">Password: {{user.password}}</div>
            </div>
        </div>
        <div class="border border-top"></div>
        <div class="row">
            <div class="col-sm-10 m-4">
                <div class="row my-2 list">
                    <router-link to="register" class="my-2">Register Property</router-link>
                    <router-link to="list" class="my-2">List a Property</router-link>
                </div>
            </div>
        </div>
        <div class="border border-top my-2"></div>
        <div class="row">
            <div class="col-sm-10 m-4 lists">
                <router-link to="register" class="my-2">Pay Rent</router-link>
                <router-link to="list" class="my-2">Book a Bus</router-link>
                <router-link to="register" class="my-2">Book a Restuarant</router-link>
                <router-link to="list" class="my-2">Book Space</router-link>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    computed: {
        user() {
            return this.$store.getters.user
        }
    },
    mounted() {
        this.$store.dispatch('user')
    }
}
</script>

<style scoped>
.profile {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.pic {
    height: 130px;
    max-width: 130px;
    border: none;
    border-radius: 50%;
    overflow: hidden;
    background: olive;
}

.details {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.list {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

.lists {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
</style>

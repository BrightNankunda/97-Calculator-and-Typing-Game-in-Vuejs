<template>
<form action="" @submit="createPost(post)">
    <h4 class="text-center font-weight-bold">Create Posts</h4>
    <div class="form-group">
        <input type="text" placeholder="Property name..." v-model="post.name" class="form-control">
    </div>

    <div class="form-group">
        <input type="text" placeholder="Property type..." v-model="post.type" class="form-control">
    </div>

    <div class="form-group">
        <input type="text" placeholder="Property location..." v-model="post.location" class="form-control">
    </div>

    <div class="form-group">
        <input type="number" placeholder="Floor space" v-model="post.floor" class="form-control">
    </div>

    <div class="form-group">
        <input type="number" placeholder="Number of rooms" v-model="post.rooms" class="form-control">
    </div>

    <div class="form-group">
        <input type="text" placeholder="Property address..." v-model="post.address" class="form-control">
    </div>

    <div class="form-group">
        <input type="number" placeholder="Property Manager's contact" v-model="post.contact" class="form-control">
    </div>

    <div class="form-group">
        <input type="number" placeholder="Property Monthly Rent Fees..." v-model="post.rentfee" class="form-control">
    </div>

    <div class="form-group">
        <textarea v-model="post.content" placeholder="Property Description" class="form-control" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <button :disabled="!isValid" class="btn btn-block btn-primary" @click.prevent="createPost(post)">Submit</button>
    </div>
</form>
</template>

<script>
export default {
    name: "CreatePost",
    data() {
        return {
            post: {
                name: '',
                type: '',
                location: '',
                floor: '',
                rooms: '',
                address: '',
                contact: '',
                rentfee: '',
                content: ''
            }
        }
    },
    methods: {
        createPost(post) {
            this.$store.dispatch('createPost', post)
        }
    },
    computed: {
        isValid() {
            return this.post.name !== '' && this.post.type !== '' && this.post.location !== '' && this.post.floor !== '' && this.post.rooms !== '' && this.post.address !== '' && this.post.contact !== '' && this.post.rentfee !== '' && this.post.content !== ''
        }
    }
}
</script>

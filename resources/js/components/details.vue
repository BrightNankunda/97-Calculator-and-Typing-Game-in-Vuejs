<template>
<div class="container mt-3">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="lead">User Deatails</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="upload" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="name" v-model="name" class="form-control" placeholder="Your name...">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" v-model="email" class="form-control" placeholder="Your email...">
                        </div>
                        <div class="form-group">
                            <input type="text" name="password" v-model="password" class="form-control" placeholder="Your password">
                        </div>
                        <div class="row" v-if="imagePreview">
                            <img :src="imagePreview" alt="Profile Pic" style="max-height:120px;">
                        </div>
                        <div class="form-group">
                            <input type="file" name="profile" @change="showProfile" class="form-control">
                        </div>
                        <div class="form-group">
                            <button :disabled="!isValid" type="submit" class="btn btn-danger">upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</template>

<script>
export default {
    data() {
        return {
            name: null,
            email: null,
            password: null,
            imagePreview: null,
            profile: null

        }
    },
    methods: {
        showProfile(e) {
            this.profile = e.target.files[0];
            let reader = new FileReader;
            reader.readAsDataURL(this.profile);
            reader.onload = e => {
                this.imagePreview = e.target.result
            }
        },
        upload() {
            let data = new FormData;
            data.append('name', this.name);
            data.append('email', this.email);
            data.append('password', this.password);
            data.append('profile', this.profile)
            axios.post('/api/profile', data)
                .then(response => {
                    console.log(response.data.name)
                    this.$router.push('/user')
                })
                .catch(err => {
                    console.log(err)
                })
        }
    },
    computed: {
        isValid() {
            return this.profile != null && this.name != null
        }
    }
}
</script>

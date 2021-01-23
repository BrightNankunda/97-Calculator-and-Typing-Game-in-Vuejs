<template>
<div>
    <div class="container">
        <form @submit.prevent="add" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Your name" v-model="name">
            </div>

            <div class="form-group">
                <label for="pic">Your Profile Pic</label>
                <input type="file" @change="showPic" name="pic" class="form-control">
            </div>

            <div v-if="imagePreview" class="p-1">
                <img :src="imagePreview" alt="pic" style="max-height=80px;">
            </div>

            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            imagePreview: null,
            name: null,
            pic: null
        }
    },
    methods: {
        showPic(e) {
            this.pic = e.target.files[0];
            let reader = new FileReader;
            reader.readAsDataURL(this.pic);
            reader.onload = e => {
                this.imagePreview = e.target.result;
            };
        },
        add() {
            let data = new FormData;
            data.append('name', this.name);
            data.append('pic', this.pic);
            axios.post('/api/lasts', data)
                .then(success => {
                    console.log(success)
                    this.$router.push('/less')
                })
                .catch(err => {
                    console.log(err)
                })
        }

    }
}
</script>

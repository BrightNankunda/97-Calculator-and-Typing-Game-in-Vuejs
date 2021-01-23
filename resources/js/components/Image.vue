<template>
<div>
    <form @submit.prevent="submitForm">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" name="title" id="title" v-model="formData.title" class="form-control" placeholder="Enter Post Title">
        </div>

        <div class="form-group">
            <label for="description">Post Description</label>
            <textearea class="form-control" name="description" v-model="formData.description"></textearea>
        </div>

        <div class="form-group">
            <label for="picture">Picture</label>
            <input type="text" name="picture" id="picture" class="form-control-file" @change="onFileChange">
        </div>
        <img v-bind:src="imagePreview" width="100" height="100" v-show="showPreview" />

        <div class="form-group">
            <input value="Submit" type="submit" class="btn btn-success">
        </div>
    </form>
</div>
</template>

<script>
export default {
    // data() {
    //     return {
    //         formFields: {
    //             title: null,
    //             description: null,
    //             picture: null
    //         },
    //     }
    // },

    // methods: {
    //     onFileChange(event) {
    //         this.formFields.picture = event.target.files[0];

    //         let reader = new FileReader();
    //         reader.addEventListener("load", function () {
    //             this.showPreview = true;
    //             this.imagePreview = reader.result;
    //         }.bind(this), false);

    //         /*
    //         Check to see if the file is not empty.
    //         */
    //         if (this.formData.picture) {
    //             /*
    //                 Ensure the file is an image file.
    //             */
    //             if (/\.(jpe?g|png|gif)$/i.test(this.formData.picture.name)) {

    //                 console.log("here");
    //                 /*
    //                 Fire the readAsDataURL method which will read the file in and
    //                 upon completion fire a 'load' event which we will listen to and
    //                 display the image in the preview.
    //                 */
    //                 reader.readAsDataURL(this.formData.picture);
    //             }
    //         }
    //     },

    //     submitForm() {
    //         let formData = new FormData();

    //         formData.append("picture", this.formFields.picture);
    //         formData.append("title", this.formFields.title);
    //         formData.append("description", this.formFields.description);

    //         axios.post('/images', formData1)
    //             .then((res) => {
    //                 console.log(res);
    //             })
    //             .catch((error) => {
    //                 console.log(error);
    //             });
    //     }
    // }

}
</script>

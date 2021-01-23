<template>
<div>
    <h1>Form</h1>
    <form action="" @submit="createPost(post)">
        <h4 class="text-center font-weight-bold">Create Posts</h4>
        <div class="form-group">
            <input type="text" placeholder="Post title" v-model="post.title" class="form-control">
        </div>

        <div class="form-group">
            <textarea v-model="post.content" placeholder="Post content" class="form-control" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <button :disabled="!isValid" class="btn btn-block btn-primary" @click.prevent="createPost(post)">Submit</button>
        </div>
    </form>

    Hostels, Apartments, Lodges Properties In Kampala
</div>
</template>

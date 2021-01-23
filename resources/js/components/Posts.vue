<template>
  <div>
    <h4 class="text-center lead">Posts</h4>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Property Type</th>
          <th scope="col">Location</th>
          <th scope="col">Address</th>
          <th scope="col">Content</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="post in posts" :key="post.id">
          <td>{{ post.name }}</td>
          <td>{{ post.type }}</td>
          <td>{{ post.location }}</td>
          <td>{{ post.address }}</td>
          <td>{{ post.content }}</td>
          <td>
            <button class="btn btn-danger" @click="deletePost(post)"><i style="color: white" class="fa fa-trash"></i>Del</button>
          </td>
          <td>
            <router-link :to="`/posts/${post.id}`" class="nav-link">View</router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "Posts",
  mounted() {
    this.$store.dispatch("fetchPosts", { post: this.$route.params.id });
  },
  methods: {
    deletePost(post) {
      this.$store.dispatch("deletePost", post);
    },
  },

  computed: {
    posts() {
      return this.$store.getters.posts;
    },
    //...mapGetters(["posts"]),
  },
};
</script>

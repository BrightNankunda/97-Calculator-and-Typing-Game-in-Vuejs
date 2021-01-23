<template>
  <div>
    {{ id }}
    {{ post }}
    <button class="btn btn-primary" @click="get">Get</button>
    <!--<h4 class="text-center lead">Post {{ post.id }}</h4>
    <div class="container">
      <p>{{ post.name }}</p>
      <p>{{ post.type }}</p>
      <p>{{ post.location }}</p>
      <p>{{ post.address }}</p>
      <p>{{ post.content }}</p>
      <p>{{ post.value }}</p>

      <button class="btn btn-danger" @click="deletePost(post)"><i style="color: white" class="fa fa-trash"></i>Del</button>
    </div>-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      id: 0,
      post: [],
    };
  },
  name: "Post",

  created() {
    this.id = this.$route.params.id;
    // axios
    //   .get("api/show/" + id)
    //   .then((response) => {
    //     console.log(response);
    //   })
    //   .catch((err) => {
    //     console.log(err);
    //   });
  },
  mounted() {
    this.fetchPost();
    // axios
    //   .get(`api/show/${this.id}`)
    //   .then((response) => {
    //     console.log(response);
    //   })
    //   .catch((err) => {
    //     console.log(err);
    //   });
    //console.log(this.id);
    // this.$store.dispatch("post", {
    //   id: this.id
    //   });
  },
  methods: {
    get() {
      //const id = this.$route.params.id;
      // axios
      //   //.get(`api/show/${this.id}`)
      //   .get("api/show/9")
      //   .then((response) => {
      //     console.log(response);
      //   })
      //   .catch((err) => {
      //     console.log(err);
      //   });
    },
    fetchPost() {
      axios
        .get("api/posts")
        .then((response) => {
          console.log(response.data);
          this.post = response.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<template>
  <div class="container">
    <div class="mx-auto mt-2">
      <div class="d-flex justify-content-center">
        <h5 class="text-center">ADD GADGET DETAILS</h5>
      </div>
      <div class="d-flex justify-content-center">
        <div class="row w-100">
          <div class="col-lg-12 border rounded">
            <form @submit.prevent="addAGadget" action="POST" class="w-100 m-2 p-2">
              <div class="form-group">
                <label for="type">Gadget Type:</label>
                <input
                  type="text"
                  class="form-control"
                  id="type"
                  name="type"
                  v-model="type"
                  placeholder="Enter Gadget type ie Laptop, phone"
                />
              </div>
              <div class="form-group">
                <label for="company">Compnay Name:</label>
                <input
                  type="text"
                  class="form-control"
                  id="company"
                  name="company"
                  v-model="company"
                  placeholder="Enter company name"
                />
              </div>
              <div class="d-flex justify-content-center my-2">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center m-4">
        <div class="row w-100">
          <div class="col-lg-12 border rounded">
            <div class="d-flex justify-content-center flex-col">
              <div
                class="d-flex justify-content-center col-4"
                v-for="gadget in gadgets"
                :key="gadget.id"
              >
                <div class="card m-2">
                  <div class="card-header">
                    <h4 class="text-center">{{ gadget.type }}</h4>
                  </div>
                  <div class="card-body">
                    <h3 class="text-center">{{ gadget.company }}</h3>
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-danger" @click="deleteGadget(gadget.id)">
                      Delete
                    </button>
                    <button
                      class="btn btn-danger red"
                      @click="forceDeleteGadget(gadget.id)"
                    >
                      Force Delete
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row my-2">
        <div class="container">
          <div class="d-flex justify-content-center">
            <button class="btn btn-primary m-2" @click="fetchDeleted">
              Fetch Deleted
            </button>

            <button
              class="btn btn-success m-2"
              @click="restoreAllDeleted"
              v-if="deletedGadgets !== null"
            >
              Restore All
            </button>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-center" v-if="deletedGadgets === null">
        <div class="alert alert-success">
          <p>There are no deleted Gadgets</p>
        </div>
      </div>
      <div class="d-flex justify-content-center flex-col m-4" v-else>
        <div class="row w-100">
          <div class="col-lg-12 border rounded">
            <div class="d-flex justify-content-center flex-col">
              <div
                class="d-flex justify-content-center col-4"
                v-for="gadget in deletedGadgets"
                :key="gadget.id"
              >
                <div class="card m-2">
                  <div class="card-header">
                    <h4 class="text-center">{{ gadget.type }}</h4>
                  </div>
                  <div class="card-body">
                    <h3 class="text-center">{{ gadget.company }}</h3>
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-danger" @click="gadgetRestore(gadget.id)">
                      Restore {{ gadget.id }}
                    </button>
                    <button
                      class="btn btn-danger red"
                      @click="forceDeleteGadget(gadget.id)"
                    >
                      Force Delete
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="row">
          <div class="d-flex justify-content-center">
            <button class="btn btn-primary" :disbled="disablePrevious">Previous</button>
            <button class="btn btn-primary" @click="firstPage">1</button>
            <button class="btn btn-primary" @click="nextPage" :disabled="disableNext">Next</button>
          </div>
        </div>
    </div>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      company: null,
      type: null,
      gadgets: null,
      curentPage: 1,
      pages:2,
      prev_page_url: null,
      next_page_url: null
    };
  },
  created() {
    this.getGadgets();
  },
  computed: {
    // gadgets() {
    //   return this.$store.getters.gadgets;
    // },
    deletedGadgetslength() {
      return this.$store.getters.deletedGadgets.length;
    },
    disablePrevious() {
      return this.prev_page_url === null
    },
    disableNext() {
      return this.next_page_url === null
    },
    // ...mapGetters(["gadgets", "deletedGadgets"]),
    ...mapGetters(["deletedGadgets"]),

  },
  methods: {
    firstPage() {
      console.log('NEXT PAGE');
    },
    nextPage() {
      this.current_page = 2
      console.log(this.current_page);
      this.getGadgets()
      return
    },
    getGadgets() {
      // this.$store.dispatch("getGadgets");
      let url
      if(this.current_page = 1) {
        url = 'api/gadget?page=1'

      } else {
        url = 'api/gadget?page=2'
      }
      axios.get(url).then(res => {
        console.log(res.data.current_page, res.data.data,)
        this.gadgets = res.data.data
        this.current_page = res.data.current_page
        this.prev_page_url = res.data.prev_page_url
        this.next_page_url = res.data.next_page_url
        // this.per_page = res.data.
      }).catch(err => {
        console.log(err.response);
      })
    },
    
    
    addAGadget() {
      this.$store.dispatch("addAGadget", { company: this.company, type: this.type });
      this.type = " ";
      this.company = " ";
    },
    deleteGadget(id) {
      this.$store.dispatch("deleteGadget", id);
    },
    gadgetRestore(id) {
      this.$store.dispatch("restoreDeleted", id);
    },
    forceDeleteGadget(id) {
      this.$store.dispatch("forceDeleteGadget", id);
    },
    fetchDeleted() {
      this.$store.dispatch("fetchDeleted");
    },
    restoreAllDeleted() {
      this.$store.dispatch("restoreAllDeleted");
    },
    restoreDeleted($id) {
      this.store.dispatch("restoreDeleted", $id);
    },
  },
};
</script>
<style scoped>
.red {
  background: red !important;
}
.red:hover {
  background: brown !important;
}
</style>

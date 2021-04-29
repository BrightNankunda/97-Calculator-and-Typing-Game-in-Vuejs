<template>
  <div class="border-bottom">
    <div>
      <b-navbar toggleable="lg" type="dark" variant="info">
        <router-link class="text-white" to="/">HP</router-link>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <router-link class="text-white px-3" to="/posts">Home</router-link>

            <router-link class="text-white px-3" to="/image">Upload Image</router-link>
            <router-link class="text-white px-3" to="/createpost"
              >Upload A Post</router-link
            >
            <router-link class="text-white px-3" to="/last">Last</router-link>
            <router-link to="/details" class="text-white px-3">Details</router-link>
            <router-link to="/typing" class="text-white px-3">Typing</router-link>
            <router-link to="/calculator" class="text-white px-3">Calc</router-link>
            <router-link class="text-white px-3" to="/deletes">Soft Deletes</router-link>
          </b-navbar-nav>

          <!-- Right aligned nav items -->
          <b-navbar-nav class="ml-auto">
            <b-nav-form>
              <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
              <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
            </b-nav-form>

            <router-link to="/about" class="text-white my-2 px-2">About</router-link>

            <b-nav-item-dropdown right>
              <!-- Using 'button-content' slot -->
              <template #button-content>
                <em>User</em>
              </template>
              <router-link to="/user">User</router-link>
              <router-link to="/login">Login</router-link>
              <router-link to="/register">Register</router-link>
            </b-nav-item-dropdown>
          </b-navbar-nav>
        </b-collapse>
      </b-navbar>
    </div>
    <!-- <p class="lead text-center">Nankunda bright home page</p> -->
    <!-- <div> -->
    <router-view></router-view>
    <!-- </div> -->
    <div class="footer">
      <h2>My Footer</h2>
    </div>
  </div>
</template>

<script>
export default {};
</script>

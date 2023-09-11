<template>
  <div class="container">
    <div class="navbar-bav" v-if="isLogged">
      <router-link to="/dashboard">Dashboard</router-link>
      <a href="#" @click="logout">logout</a>
    </div>
    <div class="" v-else>
      <router-link to="/">Home</router-link>
      <router-link to="/login">Login</router-link>
      <router-link to="/registration">Register</router-link>
    </div>

    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      isLogged: false,
    };
  },
  created() {
    if (globalIsLogged) {
      this.isLogged = true;
    }
  },
  methods: {
    logout(e) {
      e.preventDefault();
      this.$axios.get("/sanctum/csrf-cookie").then((response) => {
        this.$axios
          .components("/api/logout")
          .then((response) => {
            if (response.data.status == 200) {
              window.location.href = "/";
            } else {
              console.log(response);
            }
          })
          .catch(function (error) {
            console.error(error);
          });
      });
    },
  },
};
</script>
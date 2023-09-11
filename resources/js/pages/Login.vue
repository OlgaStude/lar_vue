<template>
  <div class="container">
    <strong>{{ error }}</strong>
    <form>
      <label for="email">E-mail</label>
      <input
        type="email"
        id="email"
        v-model="email"
        required
        autofocus
        placeholder="enter email"
      />

      <label for="password">Password</label>
      <input
        type="password"
        id="password"
        v-model="password"
        required
        autofocus
        placeholder="enter password"
      />
    </form>

    <button type="submit" @click="handleSubmit">Log in</button>

    <div>
      not with us yet??
      <router-link to="/registration">J O I N I N</router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
      error: null,
    };
  },
  created() {},
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      this.$axios.get("/sanctum/csrf-cookie").then((response) => {
        this.$axios
          .post("api/login", {
            email: this.email,
            password: this.password,
          })
          .then((response) => {
            if (response.data.status == 200) {
              this.error = response.data.message;
              this.$router.go("/dashboard");
            } else {
              this.error = error.response.data.errors;
            }
          })
          .catch(function (error) {
            console.log(error);
          });
      });
    },
  },
};
</script>
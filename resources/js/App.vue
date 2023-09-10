<template>

    <div class="container">
        <div class="nav-bar" v-if="isLoggedin">
            <router-link to="/dashboard">Dashboard</router-link>
            <div class="" @click="logout" >logout</div>
        </div>
        <div class="nav-bar" v-else>
            <router-link to="/dashboard">Dashboard</router-link>
        </div>


        <router-view></router-view>
    </div>


</template>

<script>

    export default{
        name: 'App',
        data(){
            return{
                isLoggedin: false,
            }
        }, 
        created(){
            if(window.Laravel.isLoggedin){
                this.isLoggedin = true;
            }
        },
        methods:{
            logout(e){
                e.preventDefault();
                this.$axios.get('/sanctum/csrf-cookie').then(respone => {
                    this.$axios.post('/api/logout')
                    .then(response => {
                        if(response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
                })
                this.isLoggedin = false;
            }
        }
    }

</script>
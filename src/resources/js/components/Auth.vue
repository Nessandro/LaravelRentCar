<template>
    <div>
        <h1 class="font-normal">Auth</h1>
        <div v-if="!authToken">
            <div class="bg-gray-200 rounded py-16 px-12 m-16 flex flex-col items-center justify-center">
                <!-- User profile image -->
                <img class="rounded-full h-32 w-32" src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="user avatar" />
                <div method="post" class="mt-8 mb-4">
                    <div class="mb-4">
                        <label for="userEmail" class="sr-only">Email address</label>
                        <input class="border-solid border border-gray-400 rounded px-2 py-3" type="email" v-model="formData.email" id="userEmail" placeholder="Email address" required />
                    </div>
                    <div>
                        <label for="userEmail" class="sr-only">Password</label>
                        <input class="border-solid border border-gray-400 rounded px-2 py-3" type="password"  v-model="formData.password" id="userPass" placeholder="Password" required />
                    </div>
                    <div class="my-4 flex items-center">
                        <input class="h-4 w-4 mr-2" type="checkbox" id="userRemember" />
                        <label for="userRemember">Remember me</label>
                    </div>
                    <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold w-full py-3" type="button" @click="handleLogin">Sign in</button>

                </div>
<!--                <a href="#" class="self-start">Forgot the password?</a>-->
            </div>
        </div>
        <div v-else>
            <div>User is Authenticated</div>
            <div>Auth Token: <span v-html="authToken"></span></div>
            <div>
                <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold w-6/12 py-3" type="button" @click="handleLogout" v-if="authToken">Logout</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return {
                isAuthenticated: false,
                authToken: null,
                formData:{
                    email:      null,
                    password:   null,
                },

            }
        },
        mounted(){
            this.authToken = localStorage.getItem('token');
            //todo: check if token is still valid

        },
        methods:{
            handleLogin(){
                const self = this;
                axios.post('api/login',  this.formData)
                    .then(response => {
                        if(response.data.token){
                            self.authToken = response.data.token;
                            axios.defaults.headers.common.Authorization = `Bearer ${response.data.token}`;
                            localStorage.setItem('token', response.data.token)
                            self.$router.push({ name: 'reservations' });
                        }
                    })
                    .catch(err => {
                        console.log(err.response.data);
                    })
            },
            handleLogout(){
                const self = this;
                axios.post('api/logout',  this.formData)
                    .then(response => {
                        localStorage.removeItem('token', response.data.token)
                        self.authToken = null;
                    })
                    .catch(err => {
                        console.log(err.response.data);
                    });
            }
        }
    };
</script>

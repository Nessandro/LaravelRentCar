<template>
    <div>
        <div v-if="!token">
            <div class="rounded py-16 px-12 m-16 flex flex-col items-center justify-center">
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
<!--                        <input class="h-4 w-4 mr-2" type="checkbox" id="userRemember" />-->
<!--                        <label for="userRemember">Remember me</label>-->
                    </div>
                    <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold w-full py-3" type="button" @click="handleLogin">Sign in</button>

                </div>
<!--                <a href="#" class="self-start">Forgot the password?</a>-->
            </div>
        </div>
        <div v-else>
            <div>User is Authenticated</div>
            <div>Auth Token: <span v-html="token"></span></div>
            <div>
                <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold w-6/12 py-3" type="button" @click="handleLogout" v-if="token">Logout</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        data(){
            return {
                formData:{
                    email:      null,
                    password:   null,
                },
            }
        },
        computed:{
          user: {
              get(){
                      return this.$store.getters.user;
              }
          },
            token:{
              get(){
                  return !!this.user ? this.user.token : null;
              }
            }
        },
        methods:{
            handleLogin(){
                this.$store.dispatch('login', this.formData)
                    .then(() => this.$router.push({name: 'reservations'}))
                    .catch(err => console.log(err));
            },
            handleLogout(){
                this.$store
                    .dispatch('logout')
                    .then(() => this.$router.push({name: 'login'}))
                    .catch(err => console.log(err));
            }
        }
    };
</script>

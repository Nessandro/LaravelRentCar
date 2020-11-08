<template>
    <div>
        <div v-if="maintenance">
            <div class="container max-auto">
                <h1>Maintenance mode</h1>
            </div>
        </div>
        <div v-else>
            <div class="container max-auto">
                <header class="py-6 mb-8">
                    <h1>Rent Car Application</h1>
                </header>
                <main class="flex">
                    <aside class="w-1/5">
                        <ul class="list-reset">
                            <li class="pb-4"><router-link  to="/" exact>Home</router-link></li>
                            <li class="pb-4"><router-link to="/login">Login</router-link></li>
                            <li class="pb-4"><router-link to="/cars" >Cars</router-link></li>
                            <li class="pb-4"><router-link to="/reservations" v-if="user">Reservations</router-link></li>
                        </ul>
                    </aside>
                    <div class="primary primary flex-1">
                        <router-view></router-view>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
    export default{

        computed: {
            user: {
                get() {
                    return this.$store.getters.user;
                }
            },
        },
        data(){
            return {
                maintenance: false
            }
        },
    };
</script>

import './bootstrap';
import Vue from 'vue';
// import Vuex from 'vuex';

import VueRouter from 'vue-router';

import store from './store';
import router from './router';


Vue.use(VueRouter);

let app = new Vue({
    el: '#app',
    store,
    router,
    created(){
        this.loadStoredUser();
        this.addAxiosInterceptor();
    },
    computed: {
        user: {
            get() {
                return this.$store.getters.user;
            }
        },
    },
    methods:{
        loadStoredUser(){
            const userDetails = localStorage.getItem('user');
            if(!userDetails){
                return;
            }
            this.$store.commit('setUserData', JSON.parse(userDetails));
        },
        addAxiosInterceptor(){
            axios.interceptors.response.use(
                response => response,
                error => {

                    if (this.user && error.response.status === 401) {
                        this.$store
                            .dispatch('logout')
                            .then(() => this.$router.push({name: 'login'}))
                    }
                    return Promise.reject(error)
                }
            );
        }
    }
});



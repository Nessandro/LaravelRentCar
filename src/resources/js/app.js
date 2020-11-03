import './bootstrap';
import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';

import router from './router';


Vue.use(Vuex);
Vue.use(VueRouter);

let app = new Vue({
    el: '#app',

    router: router
});



import Vuex from 'vuex';
import Vue from "vue";

Vue.use(Vuex);

export default new Vuex.Store ({
    state:{
        user: null,
    },
    mutations:{
        setUserData(state, user){
            state.user = user;
            localStorage.setItem('user', JSON.stringify(user));
            axios.defaults.headers.common['X-Authorization'] = `Bearer ${user.token}`;
        },
        removeUserData(state){
            state.user = null;
            localStorage.removeItem('user');
            axios.defaults.headers.common['X-Authorization'] = null;
        }
    },
    actions:{
        login({ commit }, credentials){
            return axios.post('/api/login', credentials)
                .then(({ data }) => commit('setUserData', data))
        },
        logout({commit}){
            return axios.post('/api/logout').then(({ data }) => {
                commit('removeUserData')
            })
        },
    },
    getters:{
        isLogged: state => !!state.user,
        user: state =>  state.user,
    }
});

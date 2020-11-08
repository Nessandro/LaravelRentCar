import VueRouter from 'vue-router';

import routes from './routes';


const router = new VueRouter(routes)

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem('user')
    if (to.matched.some(record => record.meta.auth) && !loggedIn) {
        next('/login')
        return
    }
    next()
});

export default router;

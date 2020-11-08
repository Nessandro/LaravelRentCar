import Home from './components/Home'
import Cars from './components/Cars'
import Reservations from './components/Reservations'
import CreateReservation from './components/CreateReservation'
import Auth from './components/Auth'
import NotFound from './components/NotFound'

export default {

    mode: 'history',

    linkActiveClass: 'font-bold',

    routes: [

        {
            path: '*',
            component: NotFound
        },

        {
            path: '/',
            component: Home,
            name: 'home',
        },

        {
            path: '/reservations',
            component: Reservations,
            name: 'reservations',
            meta:{
                auth: true
            }
        },
        {
            path: '/reservations/create',
            component: CreateReservation,
            name: 'createReservation',
            meta:{
                auth: true
            }
        },

        {
            path: '/cars',
            component: Cars,
            name: 'cars',
        },

        {
            path: '/login',
            component: Auth,
            name: 'login',
        },

    ]
}

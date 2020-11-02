import Home from './components/Home'
import Reservations from './components/Reservations'
import NotFound from './components/NotFound'

export default {
    mode: 'history',

    linkActiveClass: 'font-bold',

    routes:[

        {
            path: '*',
            component: NotFound
        },

        {
            path: '/',
            component: Home
        },

        {
            path: '/reservations',
            component: Reservations
        },
    ]
}

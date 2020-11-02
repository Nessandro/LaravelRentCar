import Home from './components/Home'
import Reservations from './components/Reservations'

export default {
    mode: 'history',

    routes:[
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

// qui ci sono tutte le istruzioni delle rotte vue

//importo vue
import Vue from "vue";
//importo il router
import VueRouter from "vue-router";

//dico a vue di usare VueRouter
Vue.use(VueRouter);

//importo i componenti
import HomeComp from './components/pages/HomeComp';
import AboutComp from './components/pages/AboutComp';
import ContactsComp from './components/pages/ContactsComp';
import BlogComp from './components/pages/BlogComp';

//creo il router
const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomeComp
        },
        {
            path: '/chi-siamo',
            name: 'about',
            component: AboutComp
        },
        {
            path: '/contatti',
            name: 'contacts',
            component: ContactsComp
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogComp
        },
    ]
});

//lo esporto per poterlo importare dentro front.js che inizializza Vue
export default router;

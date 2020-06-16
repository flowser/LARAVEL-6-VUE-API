require('./bootstrap');
window.Vue = require('vue');

import { Form, HasError, AlertError,AlertErrors, AlertSuccess} from 'vform';
import router from './router';
import { filter } from './filter';
import storeData from "./store/index";
import Vuex from 'vuex';


Vue.use(Vuex);
const store = new Vuex.Store(
    storeData
);


  Vue.component(HasError.name, HasError);
  Vue.component(AlertError.name, AlertError);
  Vue.component(AlertErrors.name, AlertErrors);
  Vue.component(AlertSuccess.name, AlertSuccess);
  window.Form = Form;



Vue.component('backendmaster', require('./components/BackendMasterComponent.vue').default);
Vue.component('frontendmaster', require('./components/FrontendMasterComponent.vue').default);
// passport
Vue.component( 'passport-clients', require('./components/passport/Clients.vue').default);
Vue.component( 'passport-authorized-clients', require('./components/passport/AuthorizedClients.vue').default);
Vue.component( 'passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue').default);


router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.

        if (!store.getters.loggedIn) {
            let reroute = window.location.replace('/');
            next({
                reroute
            });
        } else{

            next();
        }
    }
    // else if (to.matched.some(record => record.meta.requiresAuth)) {
    //     // if you are logged in buton browser seem snot but if try to log
    //     // in you will be directed to dashoabrd
    //     // if logged in, redirect to specified page after loged in.
    //     if (store.getters.loggedIn) {
    //       next({
    //         name: 'About',
    //       })
    //     } else {
    //       next()
    //     }
    //   }
    else {
        next(); // make sure to always call next()!
    }
});

const app = new Vue({
    el: '#app',
    router: router,
    store: store,
});

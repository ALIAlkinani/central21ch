
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue'); 
window.Vue.prototype.authorize = function(handler){

    let user = window.App.user;

    return user ? handler(user) : false;

}

// flash messaging
import { library } from '@fortawesome/fontawesome-svg-core'
import { faHeart } from '@fortawesome/free-solid-svg-icons'

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faHeart)


Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('flash', require('./components/Flash.vue'));
Vue.component('paginator', require('./components/Paginator.vue'));

Vue.component('poem-view', require('./pages/Poem.vue'));
Vue.component('favorite', require('./components/favorite.vue'));
const app = new Vue({
    el: '#app',
    
});

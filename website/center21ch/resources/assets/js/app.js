
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue'); 

// flash messaging
import { library } from '@fortawesome/fontawesome-svg-core'
import { faHeart } from '@fortawesome/free-solid-svg-icons'
import { faBell} from '@fortawesome/free-solid-svg-icons'
import { faLock} from '@fortawesome/free-solid-svg-icons'
import { faUnlock} from '@fortawesome/free-solid-svg-icons'
import { faLanguage} from '@fortawesome/free-solid-svg-icons'

import * as VueGoogleMaps from "vue2-google-maps";

Vue.use(VueGoogleMaps, {
  load: { key: 'AIzaSyBW9FAJC34z2wKmGJJvW-QxF_ObdLfuzH4' }
});


import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

library.add(faHeart)
library.add(faBell)
library.add(faLock)
library.add(faUnlock)
library.add(faLanguage)
 

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('avatar-form', require('./components/AvatarForm.vue'));

Vue.component('ShowMap', require('./components/showMap.vue'));
Vue.component('ReadMap', require('./components/readMap.vue'));
Vue.component('flash', require('./components/Flash.vue'));
Vue.component('paginator', require('./components/Paginator.vue'));
Vue.component('user_notification', require('./components/UserNotification.vue'));
Vue.component('wysiwyg', require('./components/Wysiwyg.vue'));


Vue.component('poem-view', require('./pages/Poem.vue'));
Vue.component('favorite', require('./components/favorite.vue'));
const app = new Vue({
    el: '#app',
    
});


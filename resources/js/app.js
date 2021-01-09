require('./bootstrap');

window.Vue = require('vue');

Vue.component('main-component', require('./components/admin/MainComponent.vue').default);
Vue.component('insert-component', require('./components/admin/InsertComponent.vue').default);
Vue.component('trailers-component', require('./components/admin/TrailersComponent.vue').default);

Vue.component('users-component', require('./components/user/MainUserComponent.vue').default);
Vue.component('seetrailers-component', require('./components/user/SeeTrailersComponent.vue').default);

const app = new Vue({
    el: '#app',
});

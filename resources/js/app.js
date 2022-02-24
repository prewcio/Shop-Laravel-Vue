/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Includes
Vue.component('navi', require('./components/includes/Navi.vue').default);
Vue.component('webfoot', require('./components/includes/Footer.vue').default);

//Subpages
Vue.component('items', require('./components/Items.vue').default);
Vue.component('cart', require('./components/Cart.vue').default);
Vue.component('order', require('./components/Order.vue').default);
Vue.component('account', require('./components/Account').default);
Vue.component('login', require('./components/Login').default);
Vue.component('register', require('./components/Register').default);
Vue.component('contact', require('./components/Contact').default);
Vue.component('categories', require('./components/Categories').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

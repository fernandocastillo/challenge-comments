
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * AXIOS
 */
window.axios = require('axios');
window.axios.defaults.baseURL = document.head.querySelector('meta[name="api-base-url"]').content;


window.moment = require('moment')

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('layout-component', require('./components/LayoutComponent.vue'));
Vue.component('post-component', require('./components/PostComponent.vue'));
Vue.component('comment-component', require('./components/CommentComponent.vue'));


const app = new Vue({
    el: '#app'
});

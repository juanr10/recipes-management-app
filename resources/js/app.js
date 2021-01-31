/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//Install Moment.js
//MomentJs
window.moment = require('moment');
import axios from 'axios';
import Vue from 'vue';
//SweetAlert Vue
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
window.Vue = require('vue');

Vue.config.ignoredElements = ['trix-editor', 'trix-toolbar'];
Vue.use(VueSweetalert2);
Vue.component('recipe-date', require('./components/RecipeDate.vue').default);
Vue.component('delete-recipe', require('./components/DeleteRecipe.vue').default);
Vue.component('like-button', require('./components/LikeButton.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


$('.dropdown-toggle').dropdown();

$('.like-btn').on('click', function() {
    $(this).toggleClass('like-active');
 });


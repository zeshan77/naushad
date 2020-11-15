require('./bootstrap');

require('alpinejs');

import Vue from 'vue'
Window.Vue = Vue

import VuePictureSwipe from 'vue-picture-swipe';
Vue.component('vue-picture-swipe', VuePictureSwipe);

new Vue({
    el: '#app'
})

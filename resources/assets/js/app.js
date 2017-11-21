
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('tags', require('./components/Tags.vue'));
Vue.component('activities', require('./components/Activities.vue'));

Object.defineProperties(Vue.prototype, {
    $bus: {
        get () {
            return this.$root.bus;
        }
    }
});

const bus = new Vue({});

const app = new Vue({
    el: '#app',
    data: {
        bus: bus
    }
});

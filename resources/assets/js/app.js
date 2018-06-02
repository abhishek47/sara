
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

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('user-notifications', require('./components/UserNotifications.vue'));
Vue.component('dropdown-notifications', require('./components/DropdownNotifications.vue'));

const app = new Vue({
    el: '#app',


    methods: {
    	 completeTask(id) {
    	 	$('#task-check-' + id).html('<i class="fa fa-check"></i>');
    	 },

    	 incompleteTask(id) {
    	 	$('#task-check-' + id).html('');
    	 }
    }
});


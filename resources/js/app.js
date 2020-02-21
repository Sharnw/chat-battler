/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('chat-source-picker', require('./components/ChatSourcePicker.vue').default);
Vue.component('game-character-picker', require('./components/GameCharacterPicker.vue').default);
Vue.component('game-item-picker', require('./components/GameItemPicker.vue').default);

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    methods: {

    	injectApiToken(token) {
            axios.post('/token/update').then(response => {
                if(response.data){
					axios.defaults.headers.common = {
						'Authorization': 'Bearer ' + response.data.token,
						'Content-Type': 'application/json',
						'Accept': 'application/json'
					};
                }
            }).catch(error => {

            });
    	},
    },

    created() {
    	this.injectApiToken();
    }
});

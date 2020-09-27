require('./bootstrap');
window.vis= require('vis');
require('particles.js');
window.Vue = require('vue');

Vue.component('grafo', require('./components/GrafoComponent.vue').default);
Vue.component('particles',require('./components/particulas.vue').default);



const app = new Vue({
    el: '#app',
});
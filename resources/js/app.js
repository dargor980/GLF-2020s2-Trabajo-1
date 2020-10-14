require('./bootstrap');
window.vis= require('vis');
require('particles.js');
window.Vue = require('vue');

Vue.component('grafo', require('./components/GrafoComponent.vue').default);
Vue.component('integrantes', require('./components/IntegrantesComponent.vue').default);
Vue.component('home', require('./components/HomeComponent.vue').default);
Vue.component('particles',require('./components/particulas.vue').default);



const app = new Vue({
    el: '#app',
});
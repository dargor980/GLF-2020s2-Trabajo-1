require('./bootstrap');

window.Vue = require('vue');

Vue.component('grafo', require('./components/GrafoComponent.vue').default);

const app = new Vue({
    el: '#app',
});
require('./bootstrap');
window.Vue = require('vue').default;

import VueSweetalert2 from 'vue-sweetalert2'
Vue.use(VueSweetalert2);

import "sweetalert2/dist/sweetalert2.min.css";

Vue.component('listado-component', require('./components/ListadoComponent.vue').default);

const app = new Vue({
    el: '#app',
});

$('ul li').on('click', function() {
    $('li').removeClass('active');
    $(this).addClass('active');
});
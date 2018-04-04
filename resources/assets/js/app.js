import Vue from 'vue';

Vue.component('car-list', require('./components/CarListComponent'));
Vue.component('car-stats', require('./components/CarStats'));

new Vue({ el: '#app' });
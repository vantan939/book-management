require('./bootstrap');

window.Vue = require('vue').default;
Vue.component('booklist', require('./components/BookList/BookList.vue').default);

const app = new Vue({
    el: '#app'
});
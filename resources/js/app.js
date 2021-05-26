require('./bootstrap');

window.Vue = require('vue').default;
Vue.component('booklist', require('./components/BookList.vue').default);
Vue.component('mybooklist', require('./components/MyBookList.vue').default);
Vue.component('BookDetail', require('./components/BookDetail.vue').default);

const app = new Vue({
    el: '#app'
});
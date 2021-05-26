require('./bootstrap');

window.Vue = require('vue').default;
Vue.component('BookList', require('./components/BookList.vue').default);
Vue.component('MyBookList', require('./components/MyBookList.vue').default);
Vue.component('BookDetail', require('./components/BookDetail.vue').default);

const app = new Vue({
    el: '#app'
});
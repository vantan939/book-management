require('./bootstrap');
import DataTable from "vue-materialize-datatable";

window.Vue = require('vue').default;
Vue.component('BookList', require('./components/BookList.vue').default);
Vue.component('MyBookList', require('./components/MyBookList.vue').default);
Vue.component('BookDetail', require('./components/BookDetail.vue').default);
Vue.component('BookCreation', require('./components/BookCreation.vue').default);
Vue.component('BookEdit', require('./components/BookEdit.vue').default);
Vue.component('DataTable', DataTable);

const app = new Vue({
    el: '#app'
});
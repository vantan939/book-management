require('./bootstrap');
import DataTable from "vue-materialize-datatable";

window.Vue = require('vue').default;
Vue.component('BooksList', require('./components/BooksList.vue').default);
Vue.component('BooksDisabledList', require('./components/BooksDisabledList.vue').default);
Vue.component('MyBooksList', require('./components/MyBooksList.vue').default);
Vue.component('BookDetail', require('./components/BookDetail.vue').default);
Vue.component('BookCreation', require('./components/BookCreation.vue').default);
Vue.component('BookEdit', require('./components/BookEdit.vue').default);
Vue.component('DataTable', DataTable);

const app = new Vue({
    el: '#app'
});
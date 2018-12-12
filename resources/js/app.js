require('./bootstrap');
const cheerio = require('cheerio');

window.Vue = require('vue');

Vue.component('search', require('./components/Search.vue'));

const app = new Vue({
    el: '#app'
});

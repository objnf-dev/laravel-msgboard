require('./bootstrap');

window.Vue = require('vue');
window.antd = require('ant-design-vue');

Vue.component('board', require('./board.vue'));

const app = new Vue({
    el: '#app'
});

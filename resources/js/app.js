require('./bootstrap');

window.Vue = require('vue');
window.antd = require('ant-design-vue');

Vue.component('board', require('./components/board.vue'));

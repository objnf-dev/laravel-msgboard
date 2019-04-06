require('./bootstrap');
window.Vue = require('vue/dist/vue.common.js');
import Antd from 'ant-design-vue';
import "ant-design-vue/dist/antd.css";
Vue.use(Antd);

//Vue.component('msg-board', require('./board.vue'));

var SubmitButton = Vue.component('msg-submit-button',{
    template:'<a-button type="primary" id="submit-button">发送</a-button>'
});

new Vue({
    el: '#msg-board',
    components: {
        'submit-button': SubmitButton
    }
});

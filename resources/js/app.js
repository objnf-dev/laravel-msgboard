require('./bootstrap');
window.Vue = require('vue/dist/vue.common.js');
import Antd from 'ant-design-vue';
import "ant-design-vue/dist/antd.css";
Vue.use(Antd);

// 各部分组件化
var SubmitButton = Vue.component('msg-submit-button',{
    template: '<a-button type="primary" id="submit-button">发送</a-button>'
});

var MsgInputField = Vue.component('msg-input',{
    template: '<a-textarea placeholder="写下你想说的话吧！" :rows="10"/>'
});

// Vue入口点
new Vue({
    el: '#msg-board',
    components: {
        'submit-button': SubmitButton,
        'msg-input': MsgInputField
    },
    data: {
        MsgBoardStyle: {
            'text-align': 'center',
            'padding': '5% 10% 0 10%'
        },
        MsgSubmitButtonStyle: {
            'margin': '5%'
        },
        usermsgdata: {}
    }
});

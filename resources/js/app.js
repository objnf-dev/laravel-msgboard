require('./bootstrap');
window.Vue = require('vue/dist/vue.common.js');
import Antd from 'ant-design-vue';
import "ant-design-vue/dist/antd.css";
Vue.use(Antd);

// 各部分组件化
var MsgBoard = Vue.component('msg-submit-button',{
    data(){
        return {
            MsgBoardStyle: {
                'text-align': 'center',
                'padding': '5% 10% 0 10%'
            },
            MsgSubmitButtonStyle: {
                'margin': '5%'
            },
            usrmsgdata: "",
            msgUserName: ""
        }
    },
    methods:{
        sendmsg() {
            const msgSending = this.$message.loading("正在发送中...", 0);
            $.post("/msg", {
                
            }, function(){

            });
            
        }
    },
    template: '<div v-bind:style="MsgBoardStyle"> <a-textarea placeholder="写下你想说的话吧！" :rows="10" v-model="usrmsgdata" /> \
               <a-button type="primary" id="submit-button" v-bind:style="MsgSubmitButtonStyle" v-on:click="sendmsg">发送</a-button> </div>'
    
});

// Vue入口点
new Vue({
    el: '#msgboard',
    components: {
        'msg-board':MsgBoard
    }
});

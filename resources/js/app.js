require('./bootstrap');
window.Vue = require('vue/dist/vue.common.js');
import Antd from 'ant-design-vue';
import "ant-design-vue/dist/antd.css";
Vue.use(Antd);

// 各部分组件化
let MsgBoard = Vue.component('msg-board-comp',{
    data(){
        return {
            MsgBoardStyle: {
                'text-align': 'center',
                'padding': '5% 25% 0 25%'
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
            let succeed=false;
            this.$message.loading("正在发送中...", 3);
            let Cookies = document.cookie.split(';');
            let AccessData;
            for(let i=0;i<Cookies.length;i++){
                let data_arr = Cookies[i].split('=');
                if(data_arr[0].search('Authorization') !== -1){
                    AccessData = data_arr[1];
                }
            }
            window.axios.defaults.headers.common['Authorization'] = 'Bearer '+ AccessData;
            window.axios.default.post(window.location.href+"/api/push_msg", {
                    "data": this.usrmsgdata
                }).then( function(){
                    succeed=true;
                    this.$message.success("发送成功", 3);
                });
            if(!succeed){
                    this.$message.error("发送失败", 3);
            }
        }
    },
    template: '<div v-bind:style="MsgBoardStyle"> <a-textarea placeholder="写下你想说的话吧！" :rows="10" v-model="usrmsgdata" /> \
               <a-button type="primary" id="submit-button" v-bind:style="MsgSubmitButtonStyle" v-on:click="sendmsg">发送</a-button> </div>'

});

let ShowAll = Vue.component();

// Vue入口点
new Vue({
    el: '#msgboard',
    components: {
        'msg-board':MsgBoard
    }
});


const { default: axios } = require("axios")
import swal from 'sweetalert';
var qs = require('querystring')

const VueAdminSetting = {
    data() {
        return {
            data:{}
        }
    },
    beforeMount() {
        axios.post("/api/adminOptionList")
        .then(response=>{
            var data = response.data;
            if(data.success===true){
                this.data=data.result;
            }else{
                swal({
                    title:data.result.msg,
                    icon:'error'
                })
            }
        })
        .catch(error=>{
            console.error(error)
            swal({
                title:"请求出错,详细请查看控制台",
                icon:"error"
            })
        })
    },
    methods: {
        print(){
            console.log(this.data)
        },
        submit(){
            axios.post("/api/adminOptionSave",{data:qs.stringify(this.data)})
            .then(response=>{
                var data = response.data;
                if(data.success===true){
                    swal({
                        title:data.result.msg,
                        icon:'success'
                    })
                }else{
                    swal({
                        title:data.result.msg,
                        icon:'error'
                    })
                }
            })
            .catch(error=>{
                console.error(error)
                swal({
                    title:"请求出错,详细请查看控制台",
                    icon:"error"
                })
            })
        }
    },
}

Vue.createApp(VueAdminSetting).mount("#vue-admin-setting")
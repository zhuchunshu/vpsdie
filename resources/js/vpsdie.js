const { default: axios } = require("axios")
import swal from "sweetalert";

if(document.getElementById("create_list")){

    const create_list = {
        data() {
            return {
                name:"",
                url:"",
            }
        },
        methods: {
            submit(){
                axios.post("/vpsdie/api/CreateClass",{name:this.name,url:this.url})
                .then(function(response){
                    var data = response.data;
                    if(data.success===true){
                        swal({
                            title:data.result.msg,
                            icon:"success"
                        })
                    }else{
                        var content="";
                        if(data.result instanceof Array){
                            data.result.forEach(element => {
                                content = content+element+"\n"
                            });
                            swal({
                                icon : "error",
                                title: "出错啦!",
                                text:content
                            });
                        }else{
                            swal({
                                title:data.result.msg,
                                icon:"error"
                            })
                        }
                    }
                })
                .catch(function(error){
                    console.log(error)
                    swal({
                        title:"请求出错,详细请查看控制台",
                        icon:"error"
                    })
                })
            }
        },
    }

    Vue.createApp(create_list).mount("#create_list")

}
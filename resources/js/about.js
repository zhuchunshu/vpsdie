import axios from "axios";
import Gitalk from "gitalk";
import swal from "sweetalert";

const comment = {
    mounted() {
      axios
        .post("/api/githubComment")
        .then((response) => {
            var data = response.data;
            if(data.success===true){
                  var result = data.result;
                  (new Gitalk({
                      clientID: result.clientID,
                      clientSecret: result.clientSecret,
                      repo: result.repo,      // The repository of store comments,
                      owner: result.owner,
                      admin: result.admin,
                      id: location.pathname,      // Ensure uniqueness and length less than 50
                      distractionFreeMode: false  // Facebook-like distraction free mode,
                    })).render('gitalk-container')
                    
            }else{
                swal({
                    title:data.result.msg,
                    icon:"error"
                })
            }
        })
        .catch((error) => {
          console.error(error);
          swal({
            title: "请求出错,详细请查看控制台",
            icon: "error",
          });
        });
    },
  };
  
  Vue.createApp(comment).mount("#vue-comment");
  


if(document.getElementById("vue-list-data")){
    const vue_list_data = {
        data() {
          return {};
        },
        methods: {
          remove(id) {
            swal({
              title: "确定要删除此帖吗?",
              text: "删除后无法恢复,请谨慎操作",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            }).then((willDelete) => {
              if (willDelete) {
                axios
                  .post("/api/deletePostsClass", {
                    id: id,
                  })
                  .then((response) => {
                      var data = response.data;
                      if(data.success===true){
                          swal({
                              title:data.result.msg,
                              icon:'success'
                          })
                          setTimeout(() => {
                              location.href="/list";
                          }, 1200);
                      }else{
                          swal({
                              title:data.result.msg,
                              icon:'error'
                          })
                      }
                  })
                  .catch((error) => {
                    swal({
                      title: "请求出错,详细请查看控制台",
                      icon: "error",
                    });
                    console.error(error);
                  });
              } else {
                swal("好的,咱不删");
              }
            });
          },
        },
      };
      
      Vue.createApp(vue_list_data).mount("#vue-list-data");
      
}
import axios from "axios";
import Vditor from "vditor";
import Gitalk from "gitalk";
import swal from "sweetalert";

const previewElement = document.getElementById("show-content");
previewElement.addEventListener("click", (event) => {
  if (event.target.tagName === "IMG") {
    Vditor.previewImage(event.target);
  }
});
Vditor.mermaidRender(previewElement);
Vditor.abcRender(previewElement);
Vditor.chartRender(previewElement);
Vditor.mathRender(previewElement);
Vditor.mediaRender(previewElement);
Vditor.highlightRender({ lineNumber: true, enable: true }, previewElement);
Vditor.codeRender(previewElement);
Vditor.graphvizRender(previewElement);
Vditor.flowchartRender(previewElement);
Vditor.mindmapRender(previewElement);
Vditor.plantumlRender(previewElement);

// 评论

const comment = {
  mounted() {
    axios
      .post("/api/githubComment")
      .then((response) => {
        var data = response.data;
        if (data.success === true) {
          var result = data.result;
          new Gitalk({
            clientID: result.clientID,
            clientSecret: result.clientSecret,
            repo: result.repo, // The repository of store comments,
            owner: result.owner,
            admin: result.admin,
            id: location.pathname, // Ensure uniqueness and length less than 50
            distractionFreeMode: false, // Facebook-like distraction free mode,
          }).render("gitalk-container");
        } else {
          swal({
            title: data.result.msg,
            icon: "error",
          });
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

// vue-footer

const vue_footer = {
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
            .post("/api/deletePosts", {
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
                        location.href="/";
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

Vue.createApp(vue_footer).mount("#vue-footer");

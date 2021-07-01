const { default: axios } = require("axios");
import swal from "sweetalert";
import Vditor from "vditor";

if (document.getElementById("create_list")) {
  const create_list = {
    data() {
      return {
        name: "",
        url: "",
      };
    },
    methods: {
      submit() {
        axios
          .post("/vpsdie/api/CreateClass", { name: this.name, url: this.url })
          .then(function (response) {
            var data = response.data;
            if (data.success === true) {
              swal({
                title: data.result.msg,
                icon: "success",
              });
            } else {
              var content = "";
              if (data.result instanceof Array) {
                data.result.forEach((element) => {
                  content = content + element + "\n";
                });
                swal({
                  icon: "error",
                  title: "出错啦!",
                  text: content,
                });
              } else {
                swal({
                  title: data.result.msg,
                  icon: "error",
                });
              }
            }
          })
          .catch(function (error) {
            console.error(error);
            swal({
              title: "请求出错,详细请查看控制台",
              icon: "error",
            });
          });
      },
    },
  };

  Vue.createApp(create_list).mount("#create_list");
}

if (document.getElementById("create_content")) {
  const create_content = {
    data() {
      return {
        title: "",
        content: "",
        selected: 0,
        options: [{ text: "未选择", value: 0 }],
      };
    },
    watch: {
      selected: function (newval) {
        if (this.num <= 0) {
          this.num++;
        } else {
          axios
            .post("/vpsdie/api/ClassData", {
              id: newval,
            })
            .then((response) => {
              var data = response.data;
              if (data.success === false) {
                swal({
                  title: data.result.msg,
                  icon: "error",
                });
              } else {
                var title = removeBlock(this.title);
                this.title = "【" + data.result.data.name + "】" + title;
              }
            })
            .catch(function (error) {
              console.error(error);
              swal({
                title: "请求出错,详细请查看控制台",
                icon: "error",
              });
            });
        }
      },
    },
    beforeMount() {
      axios
        .post("/vpsdie/api/ClassList")
        .then((response) => (this.options = response.data))
        .catch(function (error) {
          console.error(error);
          swal({
            title: "请求出错,详细请查看控制台",
            icon: "error",
          });
        });
    },
    mounted() {
      this.content = new Vditor("content-vditor", {
        height: 360,
        toolbarConfig: {
          pin: true,
        },
        cache: {
          enable: false,
        },
        toolbar: [
          "emoji",
          "headings",
          "bold",
          "italic",
          "strike",
          "link",
          "|",
          "list",
          "ordered-list",
          "check",
          "outdent",
          "indent",
          "|",
          "quote",
          "line",
          "code",
          "inline-code",
          "insert-before",
          "insert-after",
          "table",
          "|",
          "undo",
          "redo",
          "|",
          "fullscreen",
          "edit-mode",
        ],
      });
    },
    methods: {
      submit() {
        if (this.selected == 0) {
          swal({
            title: "请选择主机商",
            icon: "error",
          });
        } else {
          axios
            .post("/vpsdie/api/Create", {
              title: this.title,
              content: this.content.getHTML(),
              class_id: this.selected,
            })
            .then(function (response) {
              var data = response.data;
              if (data.success === true) {
                swal({
                  title: data.result.msg,
                  icon: "success",
                });
                setTimeout(() => {
                    location.href="/";
                }, 1500);
              } else {
                var content = "";
                if (data.result instanceof Array) {
                  data.result.forEach((element) => {
                    content = content + element + "\n";
                  });
                  swal({
                    icon: "error",
                    title: "出错啦!",
                    text: content,
                  });
                } else {
                  swal({
                    title: data.result.msg,
                    icon: "error",
                  });
                }
              }
            })
            .catch(function (error) {
              console.error(error);
              swal({
                title: "请求出错,详细请查看控制台",
                icon: "error",
              });
            });
        }
      },
    },
  };

  Vue.createApp(create_content).mount("#create_content");
}

function removeBlock(str) {
  if (str) {
    var reg = /\【.*\】/gi;
    str = str.replace(reg, "");
  }
  return str;
}

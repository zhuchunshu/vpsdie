import "./bootstrap";
import axios from "axios";
import swal from "sweetalert";

if (document.getElementById("app")) {
  const vue_header = {
    data() {
      return {
        Username: admin.username,
        Email: admin.email,
        avatar: "/logo.svg",
        menu: "加载中",
        setting_im: "/admin/setting/im",
      };
    },
    methods: {
      // 退出登陆
      logout() {
        axios
          .post("/admin/logout")
          .then(function (response) {
            var data = response.data;
            if (data.success === false) {
              swal({
                title: "出错啦!",
                text: data.result.msg,
                icon: "error",
              });
            } else {
              swal({
                title: "Success!",
                text: data.result.msg,
                icon: "success",
              });
              setTimeout(() => {
                location.href = data.result.url;
              }, 1000);
            }
          })
          .catch(function (error) {
            swal("请求错误,详细查看控制台");
            console.log(error);
          });
      },
    },
    mounted() {
      // 获取头像
      axios
        .post("/api/avatar", { email: admin.email })
        .then((response) => (this.avatar = response.data.result.avatar))
        .catch(function (error) {
          swal("请求错误,头像获取失败,详细查看控制台");
          console.log(error);
        });
    },
  };
  Vue.createApp(vue_header).mount("#vue-header");
}

if (document.getElementById("vue-plugin-table")) {
  const plugin_table = {
    data() {
      return {
        switchs: [],
        num: 0,
      };
    },
    watch: {
      switchs: function (newval, oldval) {
        if (this.num <= 0) {
          this.num++;
        } else {
          axios
            .post("/api/AdminPluginSave", {
              data: this.switchs,
            })
            .then(function (response) {
              var data = response.data;
              if (data.success === true) {
                swal({
                  icon: "success",
                  title: data.result.msg,
                });
              } else {
                swal({
                  icon: "error",
                  title: data.result.msg,
                });
              }
            })
            .catch(function (error) {
              swal({
                icon: "error",
                title: "请求出错,详细查看控制台",
              });
              console.log(error);
            });
        }
      },
    },
    mounted() {
      //this.switchs.push("HelloWorld");
      axios
        .post("/api/AdminPluginList")
        .then((response) => (this.switchs = response.data.result.data))
        .catch(function (error) {
          swal({
            icon: "error",
            title: "请求错误,详细查看控制台",
          });
          console.log(error);
        });
    },
    methods: {
      remove(name, path) {
        if (this.switchs.indexOf(name) != -1) {
          swal({
            icon: "warning",
            title: "安全起见,卸载插件前请先禁用插件",
          });
        } else {
          axios
            .post("/api/AdminPluginRemove", {
              path: path,
            })
            .then(function (response) {
              var data = response.data;
              if (data.success === true) {
                swal({
                  title: data.result.msg,
                  icon: "success",
                });
                setTimeout(() => {
                  location.reload();
                }, 1200);
              } else {
                swal({
                  title: data.result.msg,
                  icon: "error",
                });
              }
            })
            .catch(function (error) {
              swal({
                title: "请求出错,详细查看控制台",
                icon: "error",
              });
              console.log(error);
            });
        }
      },
      // 资源迁移
      move(name) {
        if (this.switchs.indexOf(name) == -1) {
          swal({
            title: "请先启用插件后在运行迁移",
            icon: "error",
          });
        } else {
          axios
            .post("/api/AdminPluginMove", {
              name: name,
            })
            .then(function (response) {
              var data = response.data;
              if (data.success === true) {
                swal({
                  title: data.result.msg,
                  icon: "success",
                });
              } else {
                swal({
                  title: data.result.msg,
                  icon: "error",
                });
              }
            })
            .catch(function (error) {
              swal({
                title: "请求出错,详细查看控制台",
                icon: "error",
              });
              console.log(error);
            });
        }
      },
    },
  };
  Vue.createApp(plugin_table).mount("#vue-plugin-table");
}

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

            }
        },
    }

    Vue.createApp(create_list).mount("#create_list")

}
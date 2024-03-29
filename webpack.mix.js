let mix = require('laravel-mix');

function public_path($path){
    if($path){
        return "./public/"+$path;
    }else{
        return "./public"
    }
}
function resources_path($path){
    if($path){
        return "./resources/"+$path;
    }else{
        return "./resources"
    }
}

// app.js
mix.js(resources_path("js/app.js"),"js").version();

// vue.js
mix.js(resources_path("js/vue.js"),"js").vue({ version: 3 })
.webpackConfig((webpack) => {
    return {
        plugins: [
            new webpack.DefinePlugin({
                __VUE_OPTIONS_API__: true,
                __VUE_PROD_DEVTOOLS__: false,
            }),
        ],
    };
}).version();

//admin
    // login
    mix.js(resources_path("js/admin/login.js"),"js/admin").version();
    // error
    mix.js(resources_path("js/admin/error.js"),"js/admin").version();
    // component
    mix.js(resources_path("js/admin/component.js"),"js/admin").version();
    // setting
    mix.js(resources_path("js/admin/setting.js"),"js/admin").version();


// app.css
mix.sass(resources_path("sass/app.scss"),"css").version();




require("./pack2.mix")

// 设置public目录
mix.setPublicPath(public_path());

mix.setResourceRoot(resources_path());
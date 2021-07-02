<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title","标题") - {{ get_options("title",config('app_name', 'CodeFec')) }}</title>
    <link href="{{ '/tabler/css/tabler.min.css' }}" rel="stylesheet" />
    <link href="{{ '/tabler/css/tabler-flags.min.css' }}" rel="stylesheet" />
    <link href="{{ '/tabler/css/tabler-payments.min.css' }}" rel="stylesheet" />
    <link href="{{ '/tabler/css/tabler-vendors.min.css' }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="icon" href="/logo.svg" type="image/x-icon" />
    <meta name="keywords" content="{{ get_options("keywords","VPSDIE,黑名单主机商,失信主机商,失信VPS商家列表") }}">
    <meta name="description" content="{{ get_options("description","VPSDIE,黑名单主机商,失信主机商,失信VPS商家列表") }}">
    <link rel="shortcut icon" href="/logo.svg" type="image/x-icon" />
    <!-- 自定义CSS -->
    @foreach (\App\CodeFec\Ui\functions::get('css') as $key => $value)
        <link rel="stylesheet" href="{{ $value }}">
    @endforeach
    @yield('css')
</head>

<body class="antialiased">
    <div id="app" class="wrapper {{ path_class() }}-page">
        @include('vpsdie.header')
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    @yield('header')
                    <div class="row row-cards justify-content-center">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        @include('vpsdie.footer')
    </div>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="{{ mix('js/vue.js') }}"></script>
    <script src="{{ mix('js/vpsdie.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ '/tabler/js/tabler.min.js' }}"></script>
    @yield('scripts')
</body>

</html>

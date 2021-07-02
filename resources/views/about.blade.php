@extends("vpsdie.app")
@section('title', '关于本站')

@section('header')
<h2 class="page-title">
    关于本站
</h2>
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card border-0">
            <div id="show-content" class="card-body markdown vditor-reset">
                {!! get_options("about","创建于".date("Y")."年") !!}
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div id="vue-comment" class="card border-0 card-body">
            <h3 class="card-title">讨论</h3>
            <div id="gitalk-container"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ mix("js/about.js") }}"></script>
@endsection
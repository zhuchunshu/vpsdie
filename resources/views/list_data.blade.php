@extends("vpsdie.app")
@section('title', '【'.$data->name.'】的黑料列表 - 黑名单主机商|失信主机商|失信VPS商家')
@section('header')
    <div class="page-header" style="margin-top: 0px;margin-bottom:5px">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    【{{ $data->name }}】的黑料列表
                </h2>
            </div>
            <div class="col-auto ms-auto">
                <div id="vue-list-data" class="btn-list">
                    {{-- <span class="d-none d-sm-inline">
                        <a href="#" class="btn btn-white">
                            New view
                        </a>
                    </span> --}}
                    <a href="/create" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <!-- SVG icon code -->
                        投稿
                    </a>
                    @if(admin_auth()->Check())
                    <button @@click="remove('{{ $data->id }}')" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <!-- SVG icon code -->
                        删除
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="col-md-12">
        @if ($page->count())
            <div class="row row-cards">
                @foreach ($page as $value)
                    <div class="col-md-6">
                        <a href="/{{ $value->id }}.html" class="card card-body border-0">
                            @if($value->title)
                                <h3 class="card-title">
                                    {{ $value->title }}
                                </h3>
                            @endif
                            {!! subHtml(\Illuminate\Support\Str::limit($value->content, 150, '...')) !!}
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="card"><h3 class="card-body card-title">暂无内容</h3></div>
        @endif
    </div>
    {!! make_page($page) !!}
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
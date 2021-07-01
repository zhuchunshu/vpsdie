@extends("vpsdie.app")
@section('title', '黑料列表 - 黑名单主机商|失信主机商|失信VPS商家')
@section('header')
    <div class="page-header" style="margin-top: 0px;margin-bottom:5px">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    黑料列表
                </h2>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
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
@endsection

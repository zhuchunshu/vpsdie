@extends("vpsdie.app")
@section('title', '主机商列表')

@section('header')
    <div class="page-header" style="margin-top: 0px">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    主机商列表
                </h2>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    {{-- <span class="d-none d-sm-inline">
                        <a href="#" class="btn btn-white">
                            New view
                        </a>
                    </span> --}}
                    <a href="/list/create" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <!-- SVG icon code -->
                        新增主机商
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-important alert-danger alert-dismissible" role="alert">
        <div class="d-flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            </div>
            <div>
                这里仅用于收录主机商,被收录的商家不一定有黑料,请悉知!
            </div>
        </div>
        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
    </div>

@endsection

@section('content')
    <div class="col-md-12">
        @if ($page->count())
            <div class="row row-cards">
                @foreach ($page as $key => $value)
                    <div class="col-md-6">
                        <div class="card border-0">
                            <div class="card-body">
                                <h3 class="card-title">{{ $value->name }}</h3>
                                {{ $value->url }}
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        @else
            暂无内容
        @endif
    </div>
    @if ($page->hasPages())
    {!! make_page($page) !!}
    @endif
@endsection

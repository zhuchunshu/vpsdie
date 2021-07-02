@extends("vpsdie.app")
@section('title', '【' . $data->classData->name . '】的黑料')

@if($data->title)
@section('header')
<h2 class="page-title">
    {{ $data->title }}
</h2>
@endsection
@endif

@section('content')
    <div class="col-md-12">
        <div class="card border-0">
            <div id="show-content" class="card-body markdown vditor-reset">
                {!! $data->content !!}
            </div>
            @if(admin_auth()->Check())
            <div id="vue-footer" class="card-footer">
                <button @@click="remove('{{ $data->id }}')" class="btn btn-dark">删除</button>
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div id="vue-comment" class="card border-0 card-body">
            <h3 class="card-title">评论</h3>
            <div id="gitalk-container"></div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ mix("js/show.js") }}"></script>
@endsection

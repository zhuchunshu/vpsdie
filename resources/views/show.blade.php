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
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ mix("js/show.js") }}"></script>
@endsection

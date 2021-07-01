@extends("vpsdie.app")
@section('title', '发布黑料')

@section('header')
    <div class="page-header" style="margin-top: 0px;margin-bottom:8px;">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    发布黑料
                </h2>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    {{-- <span class="d-none d-sm-inline">
                        <a href="#" class="btn btn-white">
                            New view
                        </a>
                    </span> --}}
                    <a href="/" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <!-- SVG icon code -->
                        返回首页
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div id="create_content">
                    <form @@submit.prevent="submit" action="/admin/login" method="post" autocomplete="off">
                        <div class="mb-3">
                            <label class="form-label">标题 (可选)</label>
                            <input type="text" v-model="title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">主机商 <b style="color: red">*</b> <a href="/list/create" style="margin-left: 15px">新增主机商</a></label>
                            <select class="form-select" v-model="selected">
                                <option v-for="option in options" :value="option.value">@{{ option.text }}</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                内容
                            </label>
                            <div id="content-vditor">

                            </div>
                        </div>
                        <div class="form-footer" id="submit">
                            <button type="submit" class="btn btn-primary w-100">提交</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

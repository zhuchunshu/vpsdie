@extends("vpsdie.app")
@section('title', '新增主机商')

@section('header')
    <div class="page-header" style="margin-top: 0px;margin-bottom:8px;">
        <div class="row align-items-center">
            <div class="col">
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    新增主机商
                </h2>
            </div>
            <div class="col-auto ms-auto">
                <div class="btn-list">
                    {{-- <span class="d-none d-sm-inline">
                        <a href="#" class="btn btn-white">
                            New view
                        </a>
                    </span> --}}
                    <a href="/list" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <!-- SVG icon code -->
                        主机商列表
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
                <div id="create_list">
                    <form @@submit.prevent="submit" action="/admin/login" method="post" autocomplete="off">
                        <div class="mb-3">
                            <label class="form-label">名称</label>
                            <input type="text" v-model="name" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                网址
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="url" v-model="url" class="form-control" autocomplete="off" required>
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

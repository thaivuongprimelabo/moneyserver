@extends('layouts.app')
@section('content')

<section class="content-header">
    <h1>Đăng ký vị trí</h1>
</section>

<section class="content container-fluid">
    <div class="row">

        <div class="box">
            <div class="box-body">
                <form method="POST" id="frmForm" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tên gọi:</label>
                        <div class="col-md-6">
                        	<input id="name" name="name" type="text" class="form-control" value="{{ $location['name'] or '' }}" required>
                        </div>
                        <div class="col-md-4">
                        	<p class="text-left text-red"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Địa chỉ:</label>
                        <div class="col-md-6">
                        	<input id="address" name="address" type="text" class="form-control" value="{{ $location['address'] or '' }}" required>
                        </div>
                        <div class="col-md-4">
                        	<p class="text-left text-red"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Tọa độ:</label>
                        <div class="col-md-6">
                        	<input id="latlong" name="latlong" type="text" class="form-control" value="{{ $location['latlong'] or '' }}" required>
                        </div>
                        <div class="col-md-4">
                        	<a href="#" id="map_icon" data-toggle="modal" data-target="#myModal"><img src="{{ url('uploads/map-128.png') }}" width="30" /></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Hình mô tả:</label>
                        <div class="col-md-6">
                        	<button type="button" id="upload" class="btn btn-success btn-flat mr10">Tải lên</button>
                        	<input type="file" id="desc_image" name="desc_image" style="display:none" />
                        	<span id="file-name"></span>
                        </div>
                        <div class="col-md-4">
                        	<p class="text-left text-red" id="upload-error"></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                    	<a href="{{ route('locations.get') }}" class="btn btn-default btn-flat pull-right">Quay về</a>
                        <button type="submit" class="btn btn-success btn-flat pull-right mr10">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</section>

@endsection
@section('script')
@include('admin.backend.locations.google_map',['latlong' => $location['latlong'], 'create_location' => false])
@endsection

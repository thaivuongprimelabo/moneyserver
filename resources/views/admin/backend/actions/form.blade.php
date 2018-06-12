@extends('layouts.app')
@section('content')

<section class="content-header">
    <h1>Đăng ký hoạt động</h1>
</section>

<section class="content container-fluid">
    <div class="row">

        <div class="box">
            <div class="box-body">
                <form method="POST" id="frmForm" class="form-horizontal">
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
                        <label class="control-label col-sm-2">Tên gọi</label>
                        <div class="col-md-6">
                        	<input type="text" class="form-control" value="{{ $action['name'] or '' }}" name="name" id="name" />
                        </div>
                        <div class="col-md-4">
                        	<p class="text-left text-red"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Chi phí</label>
                        <div class="col-md-6">
                        	<input type="text" class="form-control" value="{{ $action['cost'] or '' }}" name="cost" id="cost" />
                        </div>
                        <div class="col-md-4">
                        	<p class="text-left text-red"></p>
                        </div>
                    </div>
                	<div class="form-group">
                        <label class="control-label col-sm-2">Thời gian</label>
                        @php
                        $arr = explode(' ', $action['created_at']);
                    	$f = explode('-', isset($arr[0]) ? $arr[0] : '');
                    	$g = explode(':', isset($arr[1]) ? $arr[1] : '');
                    	
                    	$currentDay   = \Carbon\Carbon::now()->format('d');
                    	$currentMonth = \Carbon\Carbon::now()->format('m');
                    	$currentYear  = \Carbon\Carbon::now()->format('Y');
                    	
                    	$currentHour   = \Carbon\Carbon::now()->format('h');
                    	$currentMinute = \Carbon\Carbon::now()->format('i');
                    	$currentSecond  = \Carbon\Carbon::now()->format('s');
                        @endphp
                        <div class="col-md-1">
                        	<select name="day" class="form-control">
                        		@for($i = 1; $i <= 31; $i++)
                        		@php
                        		$i = strlen($i) == 1 ? '0' . $i : $i;
                        		@endphp
                        		<option value="{{ $i }}" {{ (isset($f[2]) && $i == $f[2]) || $i == $currentDay ? 'selected=select' : '' }}>{{ $i }}</option>
                        		@endfor
                        	</select>
                        </div>
                        <div class="col-md-1">
                        	<select name="month" class="form-control">
                        		@for($i = 1; $i <= 12; $i++)
                        		@php
                        		$i = strlen($i) == 1 ? '0' . $i : $i;
                        		@endphp
                        		<option value="{{ $i }}" {{ (isset($f[1]) &&  $i == $f[1]) || $i == $currentMonth ? 'selected=select' : '' }}>{{ $i }}</option>
                        		@endfor
                        	</select>
                        </div>
                        <div class="col-md-2">
                        	<select name="year" class="form-control">
                        		@php
                        		$maxyear = \Carbon\Carbon::now()->format('Y');
                        		$minyear = 2015;
                        		@endphp
                        		@for($i = $minyear; $i <= $maxyear; $i++)
                        		<option value="{{ $i }}" {{ (isset($f[0]) &&  $i == $f[0]) || $i == $currentYear ? 'selected=select' : '' }}>{{ $i }}</option>
                        		@endfor
                        	</select>
                        </div>
                        
                        <div class="col-md-1">
                        	<select name="hour" class="form-control">
                        		@for($i = 0; $i <= 24; $i++)
                        		@php
                        		$i = strlen($i) == 1 ? '0' . $i : $i;
                        		@endphp
                        		<option value="{{ $i }}" {{ (isset($g[0]) &&  $i == $g[0]) || $i == $currentHour ? 'selected=select' : '' }}>{{ $i }}</option>
                        		@endfor
                        	</select>
                        </div>
                        <div class="col-md-1">
                        	<select name="minute" class="form-control">
                        		@for($i = 1; $i <= 60; $i++)
                        		@php
                        		$i = strlen($i) == 1 ? '0' . $i : $i;
                        		@endphp
                        		<option value="{{ $i }}" {{ (isset($g[1]) &&  $i == $g[1]) || $i == $currentMinute ? 'selected=select' : '' }}>{{ $i }}</option>
                        		@endfor
                        	</select>
                        </div>
                        <div class="col-md-1">
                        	<select name="second" class="form-control">
                        		@for($i = 1; $i <= 60; $i++)
                        		@php
                        		$i = strlen($i) == 1 ? '0' . $i : $i;
                        		@endphp
                        		<option value="{{ $i }}" {{ (isset($g[2]) &&  $i == $g[2]) || $i == $currentSecond ? 'selected=select' : '' }}>{{ $i }}</option>
                        		@endfor
                        	</select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Vị trí</label>
                        <div class="col-md-6">	
                        	<select class="form-control" id="location_id"  name="location_id" >
                        		@foreach($locations as $location)
                        		<option value="{{ $location['id'] }}" {{ (isset($action['location_id']) && $location['id'] == $action['location_id']) ? 'selected=select' : '' }}>{{ $location['name'] }}</option>
                        		@endforeach
                        	</select>
                        </div>
                        <div class="col-md-4">
                        	<a href="#" id="map_icon" data-toggle="modal" data-target="#myModal"><img src="{{ url('uploads/map-128.png') }}" width="30" /></a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Bình luận</label>
                        <div class="col-md-6">
                        	<textarea class="form-control" name="comment" id="comment">{{ $action['comment'] }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Loại hoạt động</label>
                        <div class="col-md-6">
                        	<select class="form-control" name="type_id" id="type_id">
                        		@foreach($types as $type)
                        		<option value="{{ $type['value'] }}" {{ $type['value'] == $action['type_id'] ? 'selected=select' : '' }} >{{ $type['name'] }}</option>
                        		@endforeach
                        	</select>
                        </div>
                    </div>
                    <div class="form-group">
                    	<div class="col-sm-offset-2 col-sm-10">
                    		<a href="{{ route('actions.get') }}" class="btn btn-default btn-flat pull-right">Quay về</a>
                        	<button type="submit" class="btn btn-success btn-flat pull-right mr10">Đăng ký</button>
                      	</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</section>

@endsection
@section('script')
<script>
$(document).ready(function () {
	$("#frmForm").validate({
		onfocusout: false,
		rules: {
			name: {
				required: true
			},
			cost: {
				required: true,
				digits:true,
			}
		},
		messages: {
			name : {
				required	: "Vui lòng nhập",
			},
			cost : {
				required	: "Vui lòng nhập",
				digits		: "Vui lòng nhập số"
			}
		},
		errorPlacement: function(error, element) {
	    	error.appendTo( element.parent().next('div').find('p') );
	  	},
	  	invalidHandler: function(form, validator) {
	  	}
	});
});
</script>
@include('admin.backend.locations.google_map',['latlong' => $action['latlong'], 'create_location' => true])
@endsection

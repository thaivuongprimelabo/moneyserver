@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Danh sách hoạt động</h1>
  <ol class="breadcrumb">
    <li><a href="{{Route('dashboard')}}"><i class="fa fa-dashboard"></i>{{Config::get('master.Home_Title')}}</a></li>
    <li class="active">Hoạt động</li>
  </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">

  <div class="row">
    <div class="box">
        <div class="box-body">
            <form role="form">
                <a href="{{Route('actions.add.get')}}" class="btn btn-primary btn-flat">Đăng ký</a>
            </form>
        </div>
    </div>
        
    <!-- Box Body -->
    <div id="logBox" class="box">
      @include('admin.backend.actions.ajax')
    </div>
    <!-- End Box -->
  </div>

</section>

<!-- /.content -->
@endsection
@section('script')
    <script type="text/javascript">
    function editAction(ob) {
    	window.location.href = '/admin/actions/edit/' + $(ob).attr("data-id");
    }
    </script>
@endsection

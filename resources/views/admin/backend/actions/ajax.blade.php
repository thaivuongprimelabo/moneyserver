<div class="box-header">
    <p class="box-note"><span>{{ !empty($paging['from']) ? $paging['from'] : 0 }} dòng～{{ !empty($paging['to']) ? $paging['to'] : 0 }} dòng</span> <span>Tổng cộng: {{ $paging['total'] }} dòng</span></p>
    
    <div id="paging-monitoring" class="box-tools">
      {{ $actions->links('vendor.pagination.paging', ['paging' => $paging]) }}
    </div>
</div>
<!-- /.box-header -->
<div class="box-body table-responsive no-padding">
    <table id="listLog" class="table table-hover">
      <thead>
          <tr>
            <th>Hoạt động</th>
            <th>Chi phí</th>
            <th>Vị trí</th>
            <th>Ngày tạo</th>
            <th>Bình luận</th>
            <th>Loại hoạt động</th>
            <th>Đồng bộ</th>
          </tr>
        </thead>
        <tbody>
          @foreach($actions as $action)
          <tr data-id="{{ $action['id'] }}" data-token='<?= md5($action->id . 'detail' . csrf_token()) ?>' onclick="return editAction(this);" style="cursor: pointer;">
            <td>{{ $action['name'] }}</td>
            <td>{{ number_format($action['cost'], 0, '.','.') }}</td>
            <td>{{ $action['location_name'] }}</td>
            <td>{{ $action['created_at'] }}</td>
            <td>{{ $action['comment'] }}</td>
            <td>{{ $action['type_name'] }}</td>
            <td>{{ $action['is_sync'] == 0 ? 'Chưa' : 'Đã đồng bộ' }}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
<!-- /.box-body -->

<div class="box-header">
    <p class="box-note"><span>{{ !empty($paging['from']) ? $paging['from'] : 0 }} dòng～{{ !empty($paging['to']) ? $paging['to'] : 0 }} dòng</span> <span>Tổng cộng: {{ $paging['total'] }} dòng</span></p>
    
    <div id="paging-monitoring" class="box-tools">
      {{ $types->links('vendor.pagination.paging', ['paging' => $paging]) }}
    </div>
</div>
<!-- /.box-header -->
<div class="box-body table-responsive no-padding">
    <table id="listLog" class="table table-hover">
      <thead>
          <tr>
            <th>Giá trị</th>
            <th>Tên gọi</th>
            <th>Màu sắc</th>
            <th>Biểu tượng</th>
            <th>Đồng bộ</th>
            <th>Thứ tự</th>
          </tr>
        </thead>
        <tbody>
          @foreach($types as $type)
          <tr data-id="{{ $type['value'] }}" onclick="return editType(this);" style="cursor: pointer;">
            <td>{{ $type['value'] }}</td>
            <td>{{ $type['name'] }}</td>
            <td>{{ $type['color'] }}</span></td>
            <td><img src={{ $type['icon'] }} width="45" height="45" /></td>
            <td>{{ $type['is_sync'] == 0 ? 'Chưa' : 'Đã đồng bộ' }}</td>
            <td>{{ $type['order'] }}</td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
<!-- /.box-body -->

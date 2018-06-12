<div class="box-header">
    <p class="box-note"><span>{{ !empty($paging['from']) ? $paging['from'] : 0 }} dòng～{{ !empty($paging['to']) ? $paging['to'] : 0 }} dòng</span> <span>Tổng cộng: {{ $paging['total'] }} dòng</span></p>
    
    <div id="paging-monitoring" class="box-tools">
      {{ $locations->links('vendor.pagination.paging', ['paging' => $paging]) }}
    </div>
</div>
<!-- /.box-header -->
<div class="box-body table-responsive no-padding">
    <table id="listLog" class="table table-hover">
      <thead>
          <tr>
            <th width="30%">Tên gọi</th>
            <th width="25%">Địa chỉ</th>
            <th width="10%">Vị trí</th>
            <th width="20%">Ngày tạo</th>
            <th width="10%">Đồng bộ</th>
            <th width="5%"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($locations as $location)
          <tr style="cursor: pointer;">
            <td>{{ $location['name'] or '' }}</td>
            <td style="word-wrap: break-word;">{{ $location['address'] or '' }}</td>
            <td>
            	<a href="javascript:void(0)" class="map_icon" data-toggle="modal" data-target="#myModal" data-map="{{ $location['latlong'] or '' }}"><img src="{{ url('uploads/map-128.png') }}" width="20" /></a>
            </td>
            <td>{{ $location['created_at'] }}</td>
            <td>{{ $location['is_sync'] == 0 ? 'Chưa' : 'Đã đồng bộ' }}</td>
            <td>
            	<a href="javascript:void(0)" onclick="return editLocation({{ $location['id'] }})"><img src="{{ url('uploads/edit_icon.png') }}" width="20" /></a>
            </td>
          </tr>
          @endforeach
        </tbody>
    </table>
</div>
<!-- /.box-body -->

@extends('layouts.app')
@section('tittle')
    <div class="card-header">
        <h3 class="card-title">Danh sách nguồn cung cấp</h3>
    </div>
@endsection
@section('content')
    <!-- /.card-header -->

    <div class="card-body">
    <p><a href="{{ route('nguoncungcap.them') }}" class="btn btn-lg peach-gradient btn-rounded " data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i> Thêm mới</a></p>
    <table id="example1" class="table table-hover table-bordered">
        <thead>
        <tr>
          <th width="5%">#</th>
          <th width="35%">Tên Nguồn cung cấp</th>
          <th width="5%"></th>
          <th width="5%"></th>
        </tr>
        </thead>
        <tbody>
          @foreach($nguoncungcap as $value)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->tennguon }}</td>
                <td class="text-center"><a  data-id="{{ $value->tennguon }}" data-toggle="modal" data-target="#exampleModal1" class="btn btn-outline-warning btn-rounded waves-effect" ><i class="fas fa-edit"></i> Sửa</a></td>
                <td class="text-center"><a href="{{ route('loaisp.xoa', ['id' => $value->id]) }}" class="btn btn-outline-danger btn-rounded waves-effect" onclick="return confirm('Bạn có muốn xóa {{ $value->tenloai }} không?');"><i class="fas fa-trash-alt "></i> Xóa</a></td>
              </tr>
          @endforeach
    </tbody>
    </table>
    </div>

    <form action="{{ route('nguoncungcap.them') }}"  method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">
  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="md-form md-outline form-lg">
          <input id="validationDefault01" class="form-control form-control-lg" name="tennguon" type="text" required="" oninvalid="this.setCustomValidity('Không được bỏ trống!')"
 oninput="setCustomValidity('')">
          <label for="validationCustom01">Tên nguồn cung cấp</label>

        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-rounded">Lưu</button>
      </div>
    </div>
  </div>
</div>
</form>



      </form>








@endsection
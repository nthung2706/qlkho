@extends('layouts.app')
@section('tittle')
    <div class="card-header">
        <h3 class="card-title">Danh sách công việc</h3>
    </div>
@endsection
@section('content')
    <!-- /.card-header -->
    <div class="card-body">
    <a href="{{ route('kho.them') }}" class="btn btn-lg peach-gradient btn-rounded " data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i> Thêm mới</a>
    <br/>
    <table id="example1" class="table table-hover">
        <thead>
        <tr>
          <th width="5%">#</th>
          <th width="%">Tên hàng</th>
          <th width="%">Ngày</th>
          <th width="%">Trạng thái</th>
          <th width="%">Số lượng</th>
          <th width="%">Ghi chú</th>
          <th width="10%"></th>
          <th width="10%"></th>
        </tr>
        </thead>
        <tbody>
          @foreach($kho as $value)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->hanghoa->tenhh }}</td>
                <td>{{ $value->ngay }}</td>
                <td>{{ $value->trangthai }}</td>
                <td>{{ $value->soluong }}</td>
                <td>{{ $value->ghichu }}</td>
                <td class="text-center"><a  data-id="{{ $value->hanghoa->tenhh }}" data-toggle="modal" data-target="#exampleModal1" class="btn btn-outline-warning btn-rounded waves-effect" ><i class="fas fa-edit"></i> Sửa</a></td>
                <td class="text-center"><a href="{{ route('kho.xoa', ['id' => $value->id]) }}" class="btn btn-outline-danger btn-rounded waves-effect" onclick="return confirm('Bạn có muốn xóa {{ $value->hanghoa->tenhh }} không?');"><i class="fas fa-trash-alt "></i> Xóa</a></td>
              </tr>
          @endforeach
    </tbody>
    </table>
    </div>

<form action="{{ route('kho.them') }}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

    <div class="modal-content" style="border-radius: 20px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

            <div class="form-lg">
              <label for="">Tên Hàng hóa</label>   
              <select name="donvi_id" id="donvi_id"
                  class="form-control @error('donvi_id') is-invalid @enderror">
                  <option value="">--Chọn--</option>
                  @foreach ($hanghoa as $value)        
                          <option value="{{ $value->id }}">
                              {{ $value->tenhh }}
                          </option>                 
                  @endforeach
                  @error('hanghoa_id')
                      <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                  @enderror
              </select>
            </div>
          <div class="row">

            <div class="col-md-6">
              <div class="md-form md-outline input-with-post-icon datepicker form-lg">
                <input placeholder="Select date" type="date" id="startdateId" class="form-control" name="ngaylap">
                <label for="example">Chọn ngày</label>
              </div>
            </div>

            



        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-secondary btn-rounded waves-effect" data-dismiss="modal">Thêm mới</button>
        <button type="submit" class="btn btn-outline-primary btn-rounded waves-effect">Vẩn là thêm mới nhưng màu khác</button>
      </div>
    </div>
  </div>
</div>
</form>






{{-- Xuất --}}

<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"aria-hidden="true">
  <form action="{{ route('hoadon.them') }}" id="form2" name="form2" method="post" enctype="multipart/form-data">
          @csrf
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content" style="border-radius: 20px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
            <div class="md-form md-outline form-  ">
                <input id="validationDefault01" class="form-control form-control-lg" value="{{ Auth::user()->name }}" placeholder="" name="nguoilap" type="text" required="" oninvalid="this.setCustomValidity('Không được bỏ trống!')" oninput="setCustomValidity('')">
                <label for="validationCustom01">Người nhập</label>
              </div>

          <div class="row">
            <div class="col-md-6">
              <div class="md-form md-outline input-with-post-icon datepicker form-lg">
                <input placeholder="Select date" type="date" id="startdateId" class="form-control" name="ngaylap">
                <label for="example">Chọn ngày</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="md-form md-outline form-  ">
                <input id="validationDefault01" class="form-control form-control-lg" pattern="[0-9]{10}" value="" placeholder="" name="sdt" type="number" required="" oninvalid="this.setCustomValidity('Không được bỏ trống!')" oninput="setCustomValidity('')">
                <label for="validationCustom01">Số điện thoại</label>
              </div>
              </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-lg">
                <label class="min"  for="">Tỉnh</label>   
                  <select onchange="gettinh(this)" id="provinces" name="tinh" class="browser-default custom-select"> 
                   
                  </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-lg">
                <label class="min"  for="">Huyện</label>   
                <select disabled="disabled" onchange="gethuyen(this)" id="districts" name="huyen" class="browser-default custom-select"> 
                  <option selected="selected">
                  --Chọn--
                  </option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div  class="form-lg">
                <label class="min" for="">Xã/Thị trấn</label>   
                <select disabled="disabled" onchange="getthitran(this)" id="wards" name="thitran" class="browser-default custom-select">
                  <option selected="selected">
                  --Chọn--
                  </option>
                </select>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary btn-rounded waves-effect" data-dismiss="modal">Thêm mới</button>
        <button type="submit" class="btn btn-outline-primary btn-rounded waves-effect">Vẩn là thêm mới nhưng màu khác</button>
      </div>
    </div>
  </div>
  </form>
</div>


<script>
var date = new Date();
var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;

document.getElementById("startdateId").value = today;
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>








@endsection
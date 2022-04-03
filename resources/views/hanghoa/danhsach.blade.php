@extends('layouts.app')
@section('tittle')
    <div class="card-header">
        <h3 class="card-title">Kho hàng hóa</h3>
    </div>
@endsection
@section('content')
    <!-- /.card-header -->
    <div class="card-body">

      <a href="{{ route('hanghoa.them') }}" class="btn btn-lg peach-gradient btn-rounded " data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i> Thêm mới</a>

      <button type="button" class="btn btn-lg peach-gradient btn-rounded" data-toggle="modal" data-target="#centralModalDanger"><i class="fas fa-file-excel"></i>
        Xuất hóa đơn
     </button>
      <button type="button" class="btn btn-lg peach-gradient btn-rounded" data-toggle="modal" data-target="#centralModalInfo"><i class="fas fa-file-excel"></i>
        Nhập từ excel
     </button>
     <a href="{{ route('hanghoa.xuat') }}" class="btn btn-lg peach-gradient btn-rounded "><i class="fa fa-download" aria-hidden="true"></i> Xuất ra Excel</a>

    

     


    <table id="example1" class="table table-hover">
        <thead>
        <tr>
          <th width="5%">#</th>
          <th width="%">Loại sp</th>
          <th width="%">Nguồn cung cấp</th>
          <th width="%">Tên hàng hóa</th>
          <th width="%">Giá nhập</th>
          <th width="%">Giá bán</th>
          <th width="%">Số lượng</th>
          <th width="%">Khối lượng</th>    
          <th width="%">Ngày nhập</th>    
          <th width="10%">Hình ảnh</th>
          <th width="%">Chi tiết</th>
          <th width=""></th>


        </tr>
        </thead>
        <tbody>
          @foreach($hanghoa as $value)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $value->loaisp->tenloai }}</td>
                <td>{{ $value->nguoncungcap->tennguon }}</td>
                <td>{{ $value->tenhh }}</td>
                <td>{{ $value->gianhap }} VNĐ</td>
                <td>{{ $value->giaban }} VNĐ</td>
                <td>{{ $value->soluong }} Thùng</td>
                <td>{{ $value->khoiluong }}g</td>
                <td>{{ $value->ngaynhap }}</td>
                
                <td class="text-center" >
                  <img style="border-radius: 20px;" width="90%" height="90%" src="http://127.0.0.1/qlkho/storage/images/{{ $value->hinhanh }}" >
                </td>
                <td>{{ $value->chitiet }}</td>
                <td class="text-center">
                  <a  data-id="{{ $value->tenhh }}" data-toggle="modal" data-target="#exampleModal1" class="btn btn-outline-warning btn-rounded waves-effect" ><i class="fas fa-edit"></i> </a>
                  <a href="{{ route('hanghoa.xoa', ['id' => $value->id]) }}" class="btn btn-outline-danger btn-rounded waves-effect" onclick="return confirm('Bạn có muốn xóa {{ $value->tenhh }} không?');"><i class="fas fa-trash-alt "></i> </a>
                  
                    <form action="{{ Route('hoadon.them',['id' => $value->id]) }}" method="post" class="cart">
                      @csrf
                      <button class="btn btn-outline-danger btn-rounded waves-effect m-0" type="submit"><i class="fas fa-edit"></i></button>
                  </form> 
                </td>
               
              </tr>
          @endforeach
    </tbody>
    </table>
    </div>

    


<form action="{{ route('hanghoa.nhap') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal fade" id="centralModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
          <p class="heading lead">Nhập từ excel</p>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
          </button>
        </div>

        <!--Body-->
        <div class="modal-body">
          <div class="text-center">
              <label for="file_excel" class="form-label">Chọn tập tin Excel </label>
              <i class="fas fa-file-excel fa-1x mb-3 animated rotateIn"></i>

              <input type="file" class="form-control" id="file_excel" name="file_excel" required />
          </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-primary">fhduf</button>
        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
</form>

<form action="{{ route('hoadon.dathang') }}" method="post" >
  @csrf
  <div class="modal fade" id="centralModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-notify modal-success" role="document" style="max-width: 1300px">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
          <p class="heading lead">Phiếu xuất</p>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
          </button>
        </div>

        <!--Body-->
        <div class="modal-body">
          
        <div class="row">
          <div class="col-md-6">
            
            <div class="row">
              
              <div class="col-md-6">
                <div class="md-form md-outline form-  ">
                  <input id="validationDefault01" class="form-control form-control-lg" value="{{ Auth::user()->name }}" placeholder="" name="nguoilap" type="text" required="" oninvalid="this.setCustomValidity('Không được bỏ trống!')" oninput="setCustomValidity('')">
                  <label for="validationCustom01">Người nhập</label>
                </div>
                <div class="md-form md-outline input-with-post-icon datepicker form-lg">
                  <input placeholder="Select date" type="date" id="startdateId" class="form-control" name="ngaylap">
                  <label for="example">Chọn ngày</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="md-form md-outline form-  ">
                  <input id="validationDefault01" class="form-control form-control-lg" value="" placeholder="" name="nguoinhan" type="text" required="" oninvalid="this.setCustomValidity('Không được bỏ trống!')" oninput="setCustomValidity('')">
                  <label for="validationCustom01">Người nhận</label>
                </div>
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



            <div class="md-form md-outline form-  ">
              <input id="validationDefault01" class="form-control form-control-lg" value="" placeholder="" name="diachi" type="text" required="" oninvalid="this.setCustomValidity('Không được bỏ trống!')" oninput="setCustomValidity('')">
              <label for="validationCustom01">Địa chỉ</label>
            </div>



            <div class="md-form md-outline form-  ">
              <input id="validationDefault01" class="form-control form-control-lg" value="" placeholder="" name="ghichu" type="text" required="" oninvalid="this.setCustomValidity('Không được bỏ trống!')" oninput="setCustomValidity('')">
              <label for="validationCustom01">Ghi chú</label>
            </div>
            <div class="row">
              <div class="col-md-5">
                <div  class="form-lg">
                  <label class="min" for="">Trạng thái thanh toán</label>   
                  <select  id="" name="trangthai" class="browser-default custom-select">
                    <option selected="selected">
                    --Chọn--
                    </option>
                    <option value="0">Chưa thanh toán</option>
                    <option value="1">Đã thanh toán</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th width="20%">Hình ảnh</th>
                  <th>Tên</th>
                  <th width="15%">Số lượng</th>
                  <th>giá</th>
                  <th>Tổng tiền</th>
                </tr>
              </thead>
              <tbody>
                @foreach (Cart::content() as $value)
                <tr class="cart_item">
                  <td>{{ $loop->iteration }}</td>
                  <td class="product-thumbnail">
                    <img width="90%" height="90%" src="http://127.0.0.1/qlkho/storage/images/{{ $value->options->image }}" >

                  </td>
                  <td class="product-name">
                      <a href="single-product.html">{{ $value->name }}</a>
                  </td>

                  <td class="product-quantity">
                    <div style="display: flex;max-height: 30px;">
                        <a class="btn btn-success p-1"
                            href="{{ route('home.giohang.giam', ['row_id' => $value->rowId]) }}">-</a>
                        <input style="max-width: 25px" type="number" size="1" class="input-text qty text"
                            title="Qty" value="{{ $value->qty }}" min="0" step="1">
                            <a class="btn btn-success p-1"
                            href="{{ route('home.giohang.tang', ['row_id' => $value->rowId]) }}">+</a>
                    </div>
                </td>
                  <td class="product-price">
                      <span
                          class="amount">{{ number_format($value->price - ($value->options->discount * $value->price) / 100) }}<sup><u>đ</u></sup></span>
                  </td>
                
        
                  <td class="product-subtotal">
                      <span
                          class="amount">{{ number_format(($value->price - ($value->options->discount * $value->price) / 100) * $value->qty) }}<sup><u>đ</u></sup></span>
                  </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>

        </div>

        <!--Footer-->
       

        
        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-success">Xuất hóa đơn</button>
        </div>
      </div>
      <!--/.Content-->
      
    </div>
  </div>
</form>












    



<form action="{{ route('hanghoa.them') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">

<!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">


<div class="modal-content" style="border-radius: 20px">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLongTitle">Thêm mới</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<div class="row">

<div class="col-md-6 ml-auto">
  <div class="form-lg">
      <label for="">Loại sản phẩm</label>   
      <select name="loaisp_id" id="loaisp_id"
          class="form-control @error('loaisp_id') is-invalid @enderror">
          <option value="">--Chọn--</option>
          @foreach ($loaisp as $value)        
                  <option value="{{ $value->id }}">
                      {{ $value->tenloai }}
                  </option>                 
          @endforeach
          @error('loaisp_id')
              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
          @enderror
      </select>
    </div>
    <div class="md-form md-outline form-  ">
      <input id="validationDefault01" class="form-control form-control-lg" name="tenhh" type="text" required="" oninvalid="this.setCustomValidity('Không được bỏ trống!')" oninput="setCustomValidity('')">
      <label for="validationCustom01">Tên Hàng hóa</label>
    </div>
    
    <div class="md-form md-outline form-md">
      <input id="validationDefault01" class="form-control form-control-lg" name="gianhap" type="number" required="" oninvalid="this.setCustomValidity('Không được bỏ trống!')" oninput="setCustomValidity('')">
      <label for="validationCustom01">Giá nhập</label>
    </div>
    
    <div class="md-form md-outline form-md">
      <input id="validationDefault01" class="form-control form-control-lg" name="giaban" type="number" required="" oninvalid="this.setCustomValidity('Không được bỏ trống!')" oninput="setCustomValidity('')">
      <label for="validationCustom01">Giá bán</label>
    </div>
    <div class="md-form md-outline form-md">
      <input id="validationDefault01" class="form-control form-control-lg" name="khoiluong" type="number" required="" oninvalid="this.setCustomValidity('Không được bỏ trống!')" oninput="setCustomValidity('')">
      <label for="validationCustom01">Khối lượng(gram)</label>
    </div>
  </div>
  <div class="col-md-6 ml-auto">
    <div class="form-lg">
      <label for="">Nguồn cung cấp</label>   
      <select name="nguoncungcap_id" id="nguoncungcap_id"
          class="form-control @error('nguoncungcap_id') is-invalid @enderror">
          <option value="">--Chọn--</option>
          @foreach ($nguoncungcap as $value)        
                  <option value="{{ $value->id }}">
                      {{ $value->tennguon }}
                  </option>                 
          @endforeach
          @error('nguoncungcap_id')
              <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
          @enderror
      </select>
    </div>
    <div class="md-form md-outline form-md">
      <input class="form-control form-control-lg" type="number" id="validationDefault01" name="soluong" min="1" max="100">
      <label for="validationCustom01">Số lượng</label>
    </div>
    <div class="md-form md-outline form-md">
      <input id="validationDefault01" class="form-control form-control-lg" name="ngaynhap" type="date">
      <label for="validationCustom01">Ngày nhập</label>
    </div>
    <div class="md-form md-outline form-md">
      <input id="validationDefault01" class="form-control form-control-lg" name="chitiet" type="text">
      <label for="validationCustom01">Chi tiết</label>
    </div>
    
  </div>

  
</div>











 
<div class="form-lg">
  <label for="">Hình ảnh</label>  
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
    </div>
    <div class="custom-file">
    
      <input type="file" class="custom-file-input" id="inputGroupFile01"
        aria-describedby="inputGroupFileAddon01" name="hinhanh">
      <label class="custom-file-label" for="inputGroupFile01">Chọn file</label>
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

<style>
  .buttons-excel{
    display: none;
  }
  .buttons-csv{
    display: none;
  }
  .buttons-print{
    display: none;
  }
  .buttons-pdf{
    display: none;
  }
  .buttons-collection {
    display: none;
  }
  .buttons-copy {
    display: none;
  }
</style>


<script>

$('#exampleModalCenter').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })


$('#exampleModalCenter1').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })


  $(document).on('click', '.qty', function(e) {
    e.preventDefault();

    // $(this) mentions the clicked element (target)
    var quantity = $(this).val();  // trasnlate: pass the value of the clicked  (target) element
    var id = $(this).attr("data-id");
    ....

}
</script>
  




@endsection
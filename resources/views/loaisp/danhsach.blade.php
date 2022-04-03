@extends('layouts.admin')
@section('tittle')
    <div class="card-header">
        <h3 class="card-title">Danh sách công việc</h3>
    </div>
@endsection
@section('content')
<div class="content-body">
  <div class="container-fluid">
				
    <div class="row page-titles">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Table</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">Datatable</a></li>
      </ol>
    </div>
        <!-- row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Fees Collection</h4>
                </div>


                <div class="card-body">
                <button type="button" class="btn btn-rounded btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal"><span class="btn-icon-start text-primary"><i class="fa fa-shopping-cart"></i></span>Thêm</button>                                    
                  <br/>
                    <div class="table-responsive">
                        <table id="example4" class="display" style="min-width: 845px">
                            <thead>
                              <tr>
                                <th width="5%">#</th>
                                <th width="35%">Tên Công việc</th>
                                <th width="10%"></th>
                                <th width="10%"></th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($loaisp as $value)
                                  <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->tenloai }}</td>
                                    <td class="text-center"><a  data-id="{{ $value->tenloai }}" data-toggle="modal" data-target="#exampleModal1" class="btn btn-outline-warning btn-rounded waves-effect" ><i class="fas fa-edit"></i> Sửa</a></td>
                                    <td class="text-center"><a href="{{ route('loaisp.xoa', ['id' => $value->id]) }}" class="btn btn-outline-danger btn-rounded waves-effect" onclick="return confirm('Bạn có muốn xóa {{ $value->tenloai }} không?');"><i class="fas fa-trash-alt "></i> Xóa</a></td>
                                  </tr>
                              @endforeach
                            </tbody>

                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
















    <!-- /.card-header -->

    <form action="{{ route('loaisp.them') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true">

  <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
  <div class="modal-dialog modal-dialog-centered" role="document">


    <div class="modal-content" style="border-radius: 20px">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Thêm mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="md-form md-outline form-lg">
          <input id="form-lg " class="form-control form-control-lg " name="tenloai" type="text">
          <label for="form-lg">Loại sản phẩm</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-outline-secondary btn-rounded waves-effect">Thêm mới</button>
        <button type="submit" class="btn btn-outline-primary btn-rounded waves-effect">Vẩn là thêm mới nhưng màu khác</button>
      </div>
    </div>
  </div>
</div>
</form>


<div class="modal fade" id="basicModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm loại sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
              <div class="md-form md-outline form-lg">
                <input id="form-lg " class="form-control form-control-lg " name="tenloai" type="text">
                <label for="form-lg">Loại sản phẩm</label>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>




<script>

fetch("https://provinces.open-api.vn/api/").then(function(e){return e.json()}).then(function(e){console.log(e);for(var n=document.getElementById("provinces"),t=0;t<e.length;t++){var o=document.createElement("option");o.value=e[t].code,o.innerHTML=e[t].name,n.appendChild(o)}}).catch(function(e){console.log(e)}),document.getElementById("provinces").addEventListener("change",function(){var e=this.value;
fetch("https://provinces.open-api.vn/api/p/"+e+"?depth=2").then(function(e){return e.json()}).then(function(e){console.log(e.districts);for(var n=document.getElementById("districts"),t=0;t<e.districts.length;t++){var o=document.createElement("option");o.value=e.districts[t].code,o.innerHTML=e.districts[t].name,n.appendChild(o)}}).catch(function(e){console.log(e)})}),document.getElementById("districts").addEventListener("change",function(){var e=this.value;
fetch("https://provinces.open-api.vn/api/d/"+e+"?depth=2").then(function(e){return e.json()}).then(function(e){console.log(e.wards);for(var n=document.getElementById("wards"),t=0;t<e.wards.length;t++){var o=document.createElement("option");o.value=e.wards[t].code,o.innerHTML=e.wards[t].name,n.appendChild(o)}}).catch(function(e){console.log(e)})});



function gettinh(sel) {
    var tinh = sel.options[sel.selectedIndex].text;
    document.getElementById("tinh").value = tinh;
}

function gethuyen(sel) {
    var huyen = sel.options[sel.selectedIndex].text;
    document.getElementById("huyen").value = huyen;
}

function getthitran(sel) {
    var thitran = sel.options[sel.selectedIndex].text;
    document.getElementById("thitran").value = thitran;
}
  </script>




@endsection
@extends('layouts.app')
@section('tittle')
    <div class="card-header">
        <h3 class="card-title">Hóa đơn</h3>
    </div>
@endsection
@section('content')
    <!-- /.card-header -->
    <div class="card-body">
      <button onclick="window.print()">Print this page</button>

    
    <table id="" class="table table-hover">
        <thead>
        <tr>
          <th width="5%">#</th>
          
          <th width="%">Tên hàng hóa</th>
          <th width="%">Ngày lập</th>
          <th width="%">Số điện thoại</th>
          <th width="%">Tỉnh</th>
          <th width="%">Huyện</th>
          <th width="%">Xã/Thị trấn</th>
          <th width="%">Giá bán</th>
          <th width="%">Số lượng</th>
          <th width="10%">Hình ảnh</th>
        </tr>
        </thead>
        <tbody>
          @foreach($chitiethoadon as $value)
              @if($value->hoadon->id == $id)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  
                  <td>{{ $value->hanghoa->tenhh }}</td>
                  <td>{{ $value->hoadon->ngaylap }}</td>
                  <td>{{ $value->hoadon->sdt }}</td>
                  <td>{{ $value->hoadon->tinh }}</td>
                  <td>{{ $value->hoadon->huyen }}</td>
                  <td>{{ $value->hoadon->thitran }}</td>
                  <td>{{ $value->giaban }}VNĐ</td>
                  <td>{{ $value->soluong }}</td>
                  <td class="text-center" >
                    <img width="90%" height="90%" alt="Girl in a jacket" src="http://127.0.0.1/qlkho/storage/images/{{ $value->hanghoa->hinhanh }}" >
                  </td>
                </tr>
              @endif
          @endforeach
    </tbody>
    </table>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"aria-hidden="true">
      <form action="{{ route('hoadon') }}" id="form2" name="form2" method="post" enctype="multipart/form-data">
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
            
                
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary btn-rounded waves-effect" data-dismiss="modal">Thêm mới</button>
            <button type="submit" class="btn btn-outline-primary btn-rounded waves-effect">Vẩn là thêm mới nhưng màu khác</button>
          </div>
        </div>
      </div>
      </form>
    </div>



    




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




<style>
  .buttons-html5{
    display: none;
  }
  .buttons-print{
    display: none;
  }
  .buttons-colvis{
    display: none;
  }
</style>






@endsection
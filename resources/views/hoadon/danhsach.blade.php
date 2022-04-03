@extends('layouts.app')
@section('tittle')
    <div class="card-header">
        <h3 class="card-title">Hóa đơn</h3>
    </div>
@endsection
@section('content')
    <!-- /.card-header -->
    <div class="card-body">
    <p><a href="{{ route('kho.them') }}" class="btn btn-lg peach-gradient btn-rounded " data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus"></i> Thêm mới</a></p>
    <table id="example1" class="table table-hover">
        <thead>
        <tr>
          <th width="5%">#</th>
          <th width="5%">Mã vạch</th>
          <th width="%">Mã hóa đơn</th>
          <th width="%">Người xuất</th>
          <th width="%">Người nhận</th>
          <th width="%">Ngày</th>
          <th width="%">Số điện thoại</th>
          <th width="15%">Trạng thái</th>
          <th></th>
        </tr>
        </thead>
        <tbody>
          @foreach($hoadon as $value)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{!! DNS1D::getBarcodeHTML($value->created_at->format('sihdmy'), "C128",1.4,22) !!}</td>
                <td>HD{{ $value->created_at->format('sihdmy') }}</td>
                <td>{{ $value->nguoilap }}</td>
                <td>{{ $value->nguoinhan }}</td>
                <td>{{ $value->ngaylap}}</td>           
                <td>{{ $value->sdt }}</td>
                <td>
                  @if( $value->trangthai == 0)
                  <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">Chưa thanh toán</button>
                  @else
                  <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light">đã thanh toán</button>

                                    @endif

                </td>
                <td class="text-center" width="10%"><a class="btn btn-outline-danger btn-rounded waves-effect m-0" href="{{ route('chitiethoadon.xem',['id' => $value->id]) }}"><i class="fa fa-info"></i></a></td>                      
              </tr>
          @endforeach
    </tbody>
    </table>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
    <script type="text/javascript">
  var minDate, maxDate;
   
   // Custom filtering function which will search data in column four between two values
   $.fn.dataTable.ext.search.push(
       function( settings, data, dataIndex ) {
           var min = minDate.val();
           var max = maxDate.val();
           var date = new Date( data[4] );
    
           if (
               ( min === null && max === null ) ||
               ( min === null && date <= max ) ||
               ( min <= date   && max === null ) ||
               ( min <= date   && date <= max )
           ) {
               return true;
           }
           return false;
       }
   );
    
   $(document).ready(function() {
       // Create date inputs
       minDate = new DateTime($('#min'), {
           format: 'MMMM Do YYYY'
       });
       maxDate = new DateTime($('#max'), {
           format: 'MMMM Do YYYY'
       });
    
       // DataTables initialisation
       var table = $('#example').DataTable();
    
       // Refilter the table
       $('#min, #max').on('change', function () {
           table.draw();
       });
   });
    </script>

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






</body>






@endsection
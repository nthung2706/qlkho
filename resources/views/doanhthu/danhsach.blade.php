@extends('layouts.app')
@section('tittle')
    <div class="card-header">
        <h3 class="card-title">Thống kê doanh thu</h3>
    </div>
@endsection
@section('content')
    <!-- /.card-header -->
    <div class="card-body">

     

        
          <p id="demo2" class="text-danger"></p>

        @php
            $tongtien = 0;
            $thang = 0;
            $tongno = 0;
            $tongdonhang = 0;
            $tongdonhangno = 0;
        @endphp
        @foreach($chitiethoadon as $value)
            @if($value->hoadon->trangthai == 1)         
                @php
                    $tongtien += $value->giaban;
                      

                @endphp
            @endif
        @endforeach

        @foreach($hoadon as $value)
          @if($value->trangthai == 1)         
            @php
                $tongdonhang += $value->trangthai;                 
            @endphp
          @endif
        @endforeach



        @foreach($chitiethoadon as $value)
          @if($value->hoadon->trangthai == 0)         
              @php
                  $tongno += $value->giaban;
             
              @endphp
          @endif
        @endforeach
      <div style="display: none">
        <input id="input1" type="text" value="{{  $tongtien }}">
        <input id="input2" type="text" value="{{  $tongno }}">
      </div>
      

    </div>

      


    <div class="container-fluid">          
        <div class="row">
            <div class="col-lg-8 col-6">
              <!-- small box -->
              
              
              <canvas id="myChart" style="width:%;max-width:600px"></canvas>
              <br/>
            <div class="row">
              <div class="col-md-6">
                
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3> {{ number_format($tongtien) }} VNĐ</h3>
      
                    <p>Tổng doanh thu</p>
                    <p>{{$thanhtoan}} Đơn hàng</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-md-6">
                <div class="small-box bg-success">
                  <div class="inner">
                      <h3> {{ number_format($tongno) }} VNĐ</h3>
      
                    <p>Tổng nợ</p>
                    <p>{{$no}} Đơn hàng</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="{{ route('hoadonno') }}" class="small-box-footer">Xem hóa đơn nợ <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
              
              
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-4 col-6">
              {{-- <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tên hàng hóa</th>
                    <th>số lượng</th>        
                  </tr>
                </thead>
                <tbody>
                  @foreach($chitiethoadon as $key=>$value)
                      
                      <tr>
                        <td>{{ $loop->iteration }}</td>                
                        <td>{{ $value->hanghoa->tenhh }}</td>
                        <td>{{ $value->soluong }}</td>
                      </tr>
                  @endforeach
                </tbody>

              </table> --}}

              <!-- small box -->
              <h2>Xem doanh thu từ nhiều tháng</h2>
                <div class="md-form md-outline input-with-post-icon datepicker">
                    <input placeholder="Select date" type="date" id="tu_ngay" name="tu_ngay" class="form-control">
                    <label for="example">Chọn từ ngày: </label>
                </div>

                <div class="md-form md-outline input-with-post-icon datepicker">
                    <input onchange="myFunction()" placeholder="Select date" type="date" id="den_ngay" name=" den_ngay" class="form-control">
                    <label for="example">Đến ngày: </label>
                </div>
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3 id="doanhthu">0 </h3>VNĐ
                    <div class="row">

                        <div class="col-md-6">
                            <p >Doanh thu từ ngày</p>
                            <p >Đến ngày</p>
                        </div>
                        <div class="col-md-6">
                            <p id="test"></p>
                            <p id="test2"></p>
                        </div>
                    </div>

                 
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            
            
            <!-- ./col -->
          </div>
    </div>
    

   
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script>
      var test = document.getElementById("input1").value;
    var test2 = document.getElementById("input2").value;
    var xValues = ["Tổng doanh thu", "Nợ chưa trả"];
    var yValues = [test, test2];
    var barColors = [
      "#33b5e5 ",
      "#00c851 ",

    ];

    new Chart("myChart1", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "Thống kê doanh thu"
        }
      }
    });
    
    
    </script>
    
    <script type="text/javascript">
    var test = document.getElementById("input1").value;
    var test2 = document.getElementById("input2").value;
    var xValues = ["Tổng doanh thu", "Nợ chưa trả"];
    var yValues = [test, test2];
    var barColors = [
      "#33b5e5 ",
      "#00c851 ",

    ];

    new Chart("myChart", {
      type: "doughnut",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "Thống kê doanh thu"
        }
      }
    });
    
    
    
    </script>
    

<script type="text/javascript">
    function myFunction() {
      var x = new Date(document.getElementById("tu_ngay").value);
      var y = new Date(document.getElementById("den_ngay").value);
      
      if(x<=y)
      {
        document.getElementById("demo2").innerHTML = "";
        //tiếp tục làm phần tổng số giờ
  
        var chitiethoadon = {!! json_encode($chitiethoadon->toArray()) !!}; //tien
        var hoadon = {!! json_encode($hoadon->toArray()) !!}; //ngay

  
        var tongdoanhthu=0;
        
        for (i = 0; i < hoadon.length; i++) 
        {
            
            var z = new Date(hoadon[i].ngaylap);
            if(x<= z && z <=y)
            {
                
                for(j=0;j<chitiethoadon.length; j++)
                {
                    if(hoadon[i].id == chitiethoadon[j].hoadon_id && hoadon[i].trangthai == 1)
                    {
                        tongdoanhthu +=  chitiethoadon[j].giaban;
                    }
                }
            }
        }
        document.getElementById("doanhthu").innerHTML = tongdoanhthu;
        function convert(str) {
        var date = new Date(str),
            mnth = ("0" + (date.getMonth() + 1)).slice(-2),
            day = ("0" + date.getDate()).slice(-2);
        return [ day, mnth,date.getFullYear()].join("-");
        }

        var test = convert(x);
        var test2 = convert(y);
        //-> "2011-06-08"
        document.getElementById("test").innerHTML = test;
        document.getElementById("test2").innerHTML = test2; 
      }
      else
      {
        // document.getElementById("demo2").innerHTML = "'Từ ngày' phải trước 'Đến ngày'";
      }
      
    }
  </script>

  <script>
    const arr = [
        { id: 1, name: "king" },
        { id: 2, name: "master" },
        { id: 3, name: "lisa" },
        { id: 4, name: "ion" },
        { id: 5, name: "jim" },
        { id: 6, name: "gowtham" },
        { id: 1, name: "jam" },
        { id: 1, name: "lol" },
        { id: 2, name: "kwick" },
        { id: 3, name: "april" },
        { id: 7, name: "sss" },
        { id: 8, name: "brace" },
        { id: 8, name: "peiter" },
        { id: 5, name: "hey" },
        { id: 6, name: "mkl" },
        { id: 9, name: "melast" },
        { id: 9, name: "imlast" },
        { id: 10, name: "glow" }
      ]

      var chitiethoadon = {!! json_encode($chitiethoadon->toArray()) !!}; //tien

      function getUnique(arr, comp) {
      const unique = arr
      .map(e => e[comp])

      // store the keys of the unique objects
      .map((e, i, final) => final.indexOf(e) === i && i)

      // eliminate the dead keys & store unique objects
      .filter(e => arr[e]).map(e => arr[e]);
      // .filter((e) => e.school == "UIT" && e.gpa >= 5.0);
      return unique;
      }

      console.log(chitiethoadon);
      console.log(getUnique(chitiethoadon,'hanghoa_id'));
  </script>










@endsection
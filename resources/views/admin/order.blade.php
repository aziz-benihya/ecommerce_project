<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: #868e96; /* Changed to match typical admin template text color */
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            text-align: left;
            margin: 20px 0;
        }
        th {
            background-color: #2d3035;
            color: #868e96; /* Changed to match */
            font-weight: 600;
            text-transform: uppercase;
        }
        tr:nth-child(even) {background-color: #34373d}
        tr:hover {background-color: #3d4148}
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #444951;
            border-radius: 5px;
            border : 2px solid #444951;
        }
        th:hover {background-color: #3d4148}
        td:hover {background-color: #3d4148}
        .table_center {
            display: flex;
            justify-content: center;
            align-items: center;

           
        }
    </style>



  </head>
  <body>
@include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class ="table_center">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Product Title</th>
                    <th>Product Price</th>
                    <th>Product Image</th>
                    <th>Status</th>
                    <th>Change Status</th>

                </tr>
                @foreach($data as $data)
                <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->rec_address}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->product->title}}</td>
                <td>{{$data->product->price}}</td>
                <td style="text-align: center;"><img src="/products/{{$data->product->image}}" alt="" style="width: 150px; display: block; margin: 0 auto;"></td>
                <td>
                    @if($data->status == 'in progress')
                        <span style="color: red;">{{$data->status}}</span>
                    
                    @elseif($data->status == 'on the way')
                        <span style="color: orange;">{{$data->status}}</span>
                    @elseif($data->status == 'delivered')
                        <span style="color: green;">{{$data->status}}</span>
                        
                    @endif
                </td>
                <td>
                    <div style="display: flex; gap: 10px;">
                        <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}" >On The Way</a>
                        <a class="btn btn-success" href="{{url('delivered',$data->id)}}" >Delivered</a>
                    </div>
                </td>    
                </tr>
                @endforeach



            </table>
            </div>




          </div>

      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
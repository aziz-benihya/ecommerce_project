<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
      .div_deg {
          display: flex;
          justify-content: center;
          align-items: center;
          margin-top: 60px;
      }
     
      .table_deg {
          border: 2px solid greenyellow;
      }
      th {
          background-color: skyblue;
          color: white;
          font-size: 19px;
          font-weight: bold;
          padding: 15px;
      }
      td {
          border: 1px solid skyblue;
          text-align: center;
          padding: 10px;
          color: white;
      }
      input[type='search'] 
      {
          width: 500px;
          height: 60px;
         margin-left: 50px
      }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">


        <form action="{{ url('search_product') }}" method="GET" class="d-flex justify-content-center mb-4">
            <input type="search" name="search" placeholder="Search for products..." >
            <button type="submit" class="btn btn-secondary">Search</button>
        </form>
          <div class="div_deg">
            <table class="table_deg">
              <tr>
                <th>Product Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
                
              </tr>
              @foreach ($product as $products)
                <tr>
                  <td>{{ $products->title }}</td>
                  <td>{!! Str::limit($products->description, 50) !!}</td>
                  <td>{{ $products->category }}</td>
                  <td>{{ $products->price }}</td>
                  <td>
                    <img height="120" width="120" src="{{ asset('products/'.$products->image) }}" alt="Product Image">
                
                  </td>
                  <td>
                    <a  class="btn btn-success" href="{{url('update_product',$products->id)}}">Edit</a>
                  </td>
                  <td>
                    <a  class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>

          <div class="div_deg">
            {{ $product->links() }}
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript files -->
    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
    <script type="text/javascript">
        function confirmation(ev) {
          ev.preventDefault(); // Empêcher la redirection immédiate
      
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          
          swal({
    title: "Are you sure you want to delete this product?",
    text: "This action is irreversible!",
    icon: "warning",
    buttons: ["Cancel", "Yes, delete"],
    dangerMode: true,
})
          .then((willDelete) => {
            if (willDelete) {
              window.location.href = urlToRedirect;
            }
          });
      
          return false;
        }
      </script>
      
    
  </body>
</html>

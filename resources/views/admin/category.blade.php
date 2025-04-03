<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
      input[type="text"] {
        width: 400px;
        height: 50px;  
      }
      .div_deg {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 30px;
      }
      .table_deg {
        text-align: center;
        margin: 50px auto;
        border: 2px solid yellowgreen;
        width: 600px;
        border-collapse: collapse;
      }
      th {
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        color: white;
      }
      td {
        color: white;
        padding: 10px;
        border: 1px solid skyblue;
      }
    </style>

    <!-- Ajouter SweetAlert & Toastr -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <h1 style="color:white;">Add Category</h1>

          <!-- Affichage du message de succès -->
          @if(session()->has('success'))
            <script>
              toastr.success("{{ session('success') }}");
            </script>
          @endif

          <div class="div_deg">
            <form action="{{ url('add_category') }}" method="post">
              @csrf
              <div>
                <input type="text" name="category" placeholder="Add Category">
                <input class="btn btn-primary" type="Submit" value="Add Category">
              </div>
            </form>
          </div>

          <div>
            <table class="table_deg">
              <tr>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              
              @foreach ($data as $item)
              <tr>
                <td>{{ $item->category_name }}</td>
                <td>
                  <a class="btn btn-success" href="{{ url('edit_category', $item->id) }}">Edit</a>
                </td>
                <td>
                  <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_category', $item->id) }}">Delete</a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Script JavaScript -->
    <script type="text/javascript">
      function confirmation(ev) {
        ev.preventDefault(); // Empêcher la redirection immédiate

        var urlToRedirect = ev.currentTarget.getAttribute('href');
        
        swal({
          title: "Are You Sure You Want To Delete This?",
          text: "This action is irreversible!",
          icon: "warning",
          buttons: true,
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

    <!-- Scripts Bootstrap & jQuery -->
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
  </body>
</html>

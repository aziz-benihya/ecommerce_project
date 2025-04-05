<!DOCTYPE html>
<html>

<head>
 @include('home.css') 
    <style>
        /* Improved styling for better centering and spacing */
        .div_deg {
            padding: 50px 0;
            margin: 0 auto;
            max-width: 1000px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        th {
            background: #87ceeb;
            color: rgb(0, 0, 0);
            font-weight: 500;
        }
        
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        
        .page-title {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #333;
        }
        
        
        .action-btn {
            background: #f44336;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
  </div>
  
  <div class="div_deg">
    <h2 class="page-title">Your Shopping Cart</h2>
    
    <table>
        <tr>
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Product Image</th>
            <th>Action</th>
        </tr>
        @foreach($cart as $cart)
        <tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td><img src="/products/{{$cart->product->image}}" width="150" ></td>
            <td><button class="action-btn">Remove</button></td>
        </tr>
        @endforeach
    </table>
  </div>

  @include('home.footer')
  
</body>
</html>
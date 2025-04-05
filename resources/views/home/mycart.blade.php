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
            position: relative; /* Added for positioning */
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            /* Move the table to the right to make room for form */
            margin-left: 300px;
            width: calc(100% - 300px);
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
        
        /* Updated order-deg class - fixed the name and positioning */
        .order-deg {
            position: absolute;
            top: 100px;
            left: 0;
            width: 280px;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        
        /* Add styling to form elements */
        .order-deg label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
        }
        
        .order-deg input[type="text"], 
        .order-deg textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }
        
        .order-deg input[type="submit"] {
            width: 100%;
            background: #87ceeb;
            color: #000;
            font-weight: bold;
            border: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .order-deg input[type="submit"]:hover {
            background: #5fb8e0;
        }
        
        /* Add new style for empty cart message */
        .empty-cart {
            margin-left: 300px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            text-align: center;
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .order-deg {
                position: static;
                width: 100%;
                margin-bottom: 20px;
            }
            
            table, .empty-cart {
                margin-left: 0;
                width: 100%;
            }
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
    
    <!-- Add success message display -->
    @if(session()->has('message'))
    <div style="margin: 15px; padding: 10px; background-color: #d4edda; color: #155724; border-radius: 4px;">
        {{ session()->get('message') }}
    </div>
    @endif
    
    <!-- Order form - unchanged -->
    <div class="order-deg">
        <form action="{{ url('confirm_order') }}" method="POST">
            @csrf  
            <div>
                <label> Receiver Name</label>
                <input type="text" name="name" placeholder="Enter your name" value="{{Auth::user()->name}}">
                <label> Receiver Address</label>
                <textarea name="address" placeholder="Enter your address" required>{{Auth::user()->address ?? ''}}</textarea>

                <label> Receiver Phone</label>
                <input type="text" name="phone" placeholder="Enter your phone number" value="{{Auth::user()->phone ?? ''}}">

                <input class="btn btn-primary" type="submit" value="Place Order" {{ isset($cart) && count($cart) > 0 ? '' : 'disabled' }}>
            </div>
        </form>
    </div>

    <!-- Show table only if cart has items -->
    @if(isset($cart) && count($cart) > 0)
    <table>
        <tr>
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Product Image</th>
            <th>Action</th>
        </tr>
        <?php $value = 0; ?>

        @foreach($cart as $cart)
        <tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td><img src="/products/{{$cart->product->image}}" width="150" ></td>
            <td>
                <a href="{{ url('remove_cart', $cart->id) }}" 
                   onclick="return confirm('Are you sure you want to remove this product?')"
                   class="btn btn-danger">
                  Remove
                </a>
            </td>
        </tr>
        <?php $value = $value + $cart->product->price; ?>
        @endforeach
    </table>
    
    <div>
        <h2 class="page-title">Total Value Of Cart: ${{$value}}</h2>
    </div>
    @else
    <!-- Show this message when cart is empty -->
    <div class="empty-cart">
        <h3>Your cart is empty</h3>
        <p>Add some products to your cart to place an order.</p>
        <a href="/" class="btn btn-primary">Continue Shopping</a>
    </div>
    @endif
  </div>

  @include('home.footer')
</body>
</html>
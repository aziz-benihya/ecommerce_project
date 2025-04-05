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
            z-index: 10; /* Keep form above other elements */
            min-height: 350px; /* Ensure minimum height */
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
        
        /* Enhanced success message styling */
        .success-alert {
            margin: 15px auto;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 800px;
            position: relative;
        }
        
        /* Add new style to handle empty cart with order form */
        .content-area {
            min-height: 500px; /* Ensure enough space for the order form */
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if we have a form submission success
            const urlParams = new URLSearchParams(window.location.search);
            const orderPlaced = localStorage.getItem('orderJustPlaced');
            
            if (orderPlaced === 'true') {
                // Hide order form and show success message
                document.getElementById('orderForm').style.display = 'none';
                document.getElementById('orderSuccess').style.display = 'block';
                // Clear the flag after showing the message
                localStorage.removeItem('orderJustPlaced');
            }
            
            // Add event listener to the form
            const form = document.getElementById('orderForm');
            if (form) {
                form.addEventListener('submit', function() {
                    localStorage.setItem('orderJustPlaced', 'true');
                });
            }
        });
    </script>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
  </div>
  
  <div class="div_deg content-area">
    <h2 class="page-title">Your Shopping Cart</h2>
    
    <!-- Enhanced success message display -->
    @if(session()->has('message'))
    <div class="success-alert">
        <i class="fa fa-check-circle" aria-hidden="true" style="margin-right: 10px;"></i>
        {{ session()->get('message') }}
    </div>
    @endif
    
    <!-- Order form with hidden success message -->
    <!-- Success message (hidden by default) -->
    <div id="orderSuccess" style="position: absolute; top: 100px; left: 0; width: 280px; background: #4CAF50; color: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 15px rgba(0,0,0,0.2); text-align: center; display: none;">
        <i class="fa fa-check-circle" style="font-size: 48px; margin-bottom: 15px;"></i>
        <h3>Order Placed Successfully!</h3>
        <p>Your order has been received and is being processed.</p>
        <a href="/" class="btn btn-light mt-3">Continue Shopping</a>
    </div>

    <!-- Order form (shown by default) -->
    <div id="orderForm" class="order-deg">
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
<!DOCTYPE html>
<html>
<head>
    @include('home.css')
    <style>
        /* Main Container */
        .div_deg {
            padding: 30px 0;
            margin: 0 auto;
            max-width: 1200px;
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }
        
        /* Page Title */
        .page-title {
            width: 100%;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.2rem;
            color: #2c3e50;
            position: relative;
            padding-bottom: 15px;
        }
        
        .page-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: #3498db;
        }
        
        /* Order Form */
        .order-deg {
            flex: 1;
            min-width: 300px;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            position: sticky;
            top: 20px;
            height: fit-content;
        }
        
        .order-deg h3 {
            color: #2c3e50;
            margin-bottom: 20px;
            font-size: 1.5rem;
            text-align: center;
        }
        
        .order-deg label {
            display: block;
            margin-bottom: 8px;
            color: #34495e;
            font-weight: 500;
        }
        
        .order-deg input[type="text"],
        .order-deg textarea {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: all 0.3s;
        }
        
        .order-deg input[type="text"]:focus,
        .order-deg textarea:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }
        
        .order-deg input[type="submit"],
        .order-deg .btn {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            display: block;
            margin-bottom: 10px;
        }
        
        .order-deg input[type="submit"] {
            background: #3498db;
            color: white;
            border: none;
        }
        
        .order-deg input[type="submit"]:hover {
            background: #2980b9;
        }
        
        #pay {
            background: #2ecc71;
            color: white;
            text-decoration: none;
        }
        
        #pay:hover {
            background: #27ae60;
        }
        
        /* Cart Table */
        .cart-container {
            flex: 2;
            min-width: 300px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        
        th {
            background: #3498db;
            color: white;
            font-weight: 500;
            padding: 15px;
            text-align: left;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #ecf0f1;
            vertical-align: middle;
        }
        
        tr:hover {
            background-color: #f8f9fa;
        }
        
        .product-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .btn-danger {
            background: #e74c3c;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-danger:hover {
            background: #c0392b;
        }
        
        /* Total Value */
        .total-value {
            margin-top: 20px;
            text-align: right;
            font-size: 1.3rem;
            color: #2c3e50;
            font-weight: bold;
        }
        
        /* Empty Cart */
        .empty-cart {
            flex: 2;
            background: #ffffff;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .empty-cart h3 {
            color: #2c3e50;
            margin-bottom: 15px;
        }
        
        .empty-cart p {
            color: #7f8c8d;
            margin-bottom: 20px;
        }
        
        .btn-primary {
            background: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary:hover {
            background: #2980b9;
        }
        
        /* Success Messages */
        .success-alert {
            width: 100%;
            padding: 15px;
            background-color: #2ecc71;
            color: white;
            border-radius: 6px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        #orderSuccess {
            display: none;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            margin-bottom: 20px;
            border: 2px solid #2ecc71;
        }
        
        #orderSuccess i {
            color: #2ecc71;
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        #orderSuccess h3 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        #orderSuccess p {
            color: #7f8c8d;
            margin-bottom: 20px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .div_deg {
                flex-direction: column;
            }
            
            .order-deg {
                position: static;
                margin-bottom: 30px;
            }
            
            .page-title {
                font-size: 1.8rem;
            }
            
            td, th {
                padding: 10px;
            }
            
            .product-image {
                width: 80px;
                height: 80px;
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
  
  <div class="div_deg">
    <h2 class="page-title">Your Shopping Cart</h2>
    
    <!-- Success message from session -->
    @if(session()->has('message'))
    <div class="success-alert">
        <i class="fa fa-check-circle" aria-hidden="true" style="margin-right: 10px;"></i>
        {{ session()->get('message') }}
    </div>
    @endif
    
    <!-- Order Success Message (hidden by default) -->
    <div id="orderSuccess" class="order-deg">
        <i class="fa fa-check-circle"></i>
        <h3>Order Placed Successfully!</h3>
        <p>Your order has been received and is being processed.</p>
        <a href="/" class="btn-primary">Continue Shopping</a>
    </div>

    <!-- Order Form (shown by default) -->
    <div id="orderForm" class="order-deg">
        <h3>Order Information</h3>
        <form action="{{ url('confirm_order') }}" method="POST">
            @csrf  
            <div>
                <label>Receiver Name</label>
                <input type="text" name="name" placeholder="Enter your name" value="{{Auth::user()->name}}">
                
                <label>Receiver Address</label>
                <textarea name="address" placeholder="Enter your address" required>{{Auth::user()->address ?? ''}}</textarea>

                <label>Receiver Phone</label>
                <input type="text" name="phone" placeholder="Enter your phone number" value="{{Auth::user()->phone ?? ''}}">

                <input type="submit" value="Cash On Delivery" {{ isset($cart) && count($cart) > 0 ? '' : 'disabled' }}>
                <a id="pay" class="btn" href="{{url('stripe')}}">Pay Using Card</a>
            </div>
        </form>
    </div>

    <!-- Cart Content -->
    <div class="cart-container">
        @if(isset($cart) && count($cart) > 0)
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $value = 0; ?>
                @foreach($cart as $cart)
                <tr>
                    <td>{{$cart->product->title}}</td>
                    <td>${{number_format($cart->product->price, 2)}}</td>
                    <td><img src="/products/{{$cart->product->image}}" class="product-image"></td>
                    <td>
                        <a href="{{ url('remove_cart', $cart->id) }}" 
                           onclick="return confirm('Are you sure you want to remove this product?')"
                           class="btn-danger">
                          Remove
                        </a>
                    </td>
                </tr>
                <?php $value = $value + $cart->product->price; ?>
                @endforeach
            </tbody>
        </table>
        
        <div class="total-value">
            Total: ${{number_format($value, 2)}}
        </div>
        @else
        <!-- Empty Cart Message -->
        <div class="empty-cart">
            <h3>Your cart is empty</h3>
            <p>Add some products to your cart to place an order.</p>
            <a href="/" class="btn-primary">Continue Shopping</a>
        </div>
        @endif
    </div>
  </div>

  @include('home.footer')
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Ecommerce</title>
    @include('home.css')
    <style>
        /* Modern styling for div_center */
        .div_center {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
            font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
        .div_center h2 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 40px;
            color: #2c3e50;
            font-size: 2.2rem;
            letter-spacing: -0.5px;
        }
        
        .div_center table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            box-shadow: 0 4px 30px rgba(0,0,0,0.05);
            margin-top: 20px;
            border-radius: 12px;
            overflow: hidden;
            background: white;
        }
        
        .div_center th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
            padding: 18px;
            text-align: center;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }
        
        .div_center th:first-child {
            border-top-left-radius: 12px;
        }
        
        .div_center th:last-child {
            border-top-right-radius: 12px;
        }
        
        .div_center td {
            padding: 18px;
            text-align: center;
            border-bottom: 1px solid #f0f0f0;
            color: #555;
            font-weight: 400;
        }
        
        .div_center tr:last-child td {
            border-bottom: none;
        }
        
        .div_center tr:hover {
            background-color: #f8f9ff;
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            transition: all 0.2s ease;
        }
        
        .empty-orders {
            text-align: center;
            padding: 60px 40px;
            background: white;
            border-radius: 12px;
            margin-top: 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        
        .empty-orders h3 {
            color: #6c757d;
            font-weight: 500;
        }
        
        .order-status {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            min-width: 100px;
            text-align: center;
        }
        
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        
        .status-processing {
            background: #cce5ff;
            color: #004085;
        }
        
        .status-delivered {
            background: #d4edda;
            color: #155724;
        }
        
        .div_center img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .div_center img:hover {
            transform: scale(1.05);
        }
        
        @media (max-width: 768px) {
            .div_center {
                padding: 20px 10px;
            }
            
            .div_center table {
                display: block;
                overflow-x: auto;
            }
            
            .div_center th, 
            .div_center td {
                padding: 12px 8px;
            }
        }
    </style>
</head>
<body>
    <div class="div_center">
        
        @include('home.header')
        <div>
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Delivery Status</th>
                    <th>Product Image</th>
                </tr>
                @foreach($orders as $order)
                <tr>
                    <td>{{ $order->product->title }}</td>
                    <td>{{ $order->product->price }}</td>
                    <td>
                    {{ $order->status }}
                    </td>
                    <td><img src="products/{{$order->product->image}}" style="width: 100px; height: 100px;"></td>

                </tr>
                @endforeach

            </table>


        </div>


    </div>
    @include('home.footer')
</body>
</html>
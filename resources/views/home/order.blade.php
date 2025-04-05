<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Ecommerce</title>
    @include('home.css')
    <style>
        /* Enhanced styling for div_center */
        .div_center {
            padding: 40px 0;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .div_center h2 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333;
        }
        
        .div_center table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .div_center th {
            background: #87ceeb;
            color: rgb(0, 0, 0);
            font-weight: 500;
            padding: 15px;
            text-align: center;
        }
        
        .div_center td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        
        .div_center tr:hover {
            background-color: #f9f9f9;
        }
        
        .empty-orders {
            text-align: center;
            padding: 40px;
            background: #f9f9f9;
            border-radius: 8px;
            margin-top: 20px;
        }
        
        .order-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }
        
        .status-pending {
            background: #ffe0b2;
            color: #e65100;
        }
        
        .status-processing {
            background: #bbdefb;
            color: #0d47a1;
        }
        
        .status-delivered {
            background: #c8e6c9;
            color: #2e7d32;
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
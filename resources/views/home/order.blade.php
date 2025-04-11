<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Ecommerce</title>
    @include('home.css')
    <style>
       /* Style moderne pour la page de commandes */
.div_center {
    padding: 40px 20px;
    max-width: 1400px;
    margin: 0 auto;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    background-color: #f8fafc;
    min-height: 100vh;
}

.div_center h2 {
    text-align: center;
    font-weight: 700;
    margin-bottom: 30px;
    color: #1e293b;
    font-size: 2rem;
    position: relative;
    padding-bottom: 15px;
}

.div_center h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: linear-gradient(90deg, #6366f1, #8b5cf6);
    border-radius: 2px;
}

.div_center table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 30px;
    border-radius: 12px;
    overflow: hidden;
    background: white;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
}

.div_center th {
    background-color: #f1f5f9;
    color: #64748b;
    font-weight: 600;
    padding: 16px 24px;
    text-align: left;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 2px solid #e2e8f0;
}

.div_center td {
    padding: 20px 24px;
    color: #334155;
    font-weight: 500;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
}

.div_center tr:last-child td {
    border-bottom: none;
}

.div_center tr:hover {
    background-color: #f8fafc;
}

.order-status {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 100px;
}

.status-pending {
    background-color: #ffedd5;
    color: #9a3412;
}

.status-processing {
    background-color: #dbeafe;
    color: #1e40af;
}

.status-delivered {
    background-color: #dcfce7;
    color: #166534;
}

.div_center img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    transition: transform 0.2s ease;
}

.div_center img:hover {
    transform: scale(1.05);
}

.empty-orders {
    text-align: center;
    padding: 60px 40px;
    background: white;
    border-radius: 12px;
    margin-top: 30px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
}

.empty-orders h3 {
    color: #64748b;
    font-weight: 500;
    margin-bottom: 20px;
}

.empty-orders .btn {
    background: linear-gradient(90deg, #6366f1, #8b5cf6);
    color: white;
    border: none;
    padding: 10px 24px;
    border-radius: 6px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

.empty-orders .btn:hover {
    opacity: 0.9;
    transform: translateY(-1px);
}

@media (max-width: 768px) {
    .div_center {
        padding: 20px 15px;
    }
    
    .div_center table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
    
    .div_center th, 
    .div_center td {
        padding: 12px 15px;
    }
    
    .div_center h2 {
        font-size: 1.5rem;
    }
}

/* Animation pour les lignes du tableau */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.div_center tr {
    animation: fadeIn 0.3s ease forwards;
    animation-delay: calc(var(--order) * 0.05s);
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
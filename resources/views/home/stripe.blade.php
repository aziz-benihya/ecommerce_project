<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        #card-element {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            margin: 10px 0;
        }
        button {
            background-color: #6772e5;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #5469d4;
        }
        .errors {
            color: #fa755a;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h2>Stripe Payment</h2>
    
    <form id="payment-form">
        <div id="card-element">
            <!-- Stripe Card Element will be inserted here -->
        </div>
        
        <div id="card-errors" class="errors" role="alert"></div>
        
        <button id="payButton">Pay Now</button>
    </form>

    <script type="text/javascript">
        // Initialize Stripe with your publishable key
        var stripe = Stripe("{{ config('services.stripe.key') }}");
        var elements = stripe.elements();
        
        // Create card element
        var card = elements.create('card');
        card.mount('#card-element');
        
        // Handle real-time validation errors
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        
        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            document.getElementById('payButton').disabled = true;
            
            fetch("{{ route('payment.intent') }}", {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
})
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                stripe.confirmCardPayment(data.clientSecret, {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: 'Customer Name' // You should collect this from a form
                        }
                    }
                })
                .then(function(result) {
                    if (result.error) {
                        // Show error to customer
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        document.getElementById('payButton').disabled = false;
                    } else {
                        if (result.paymentIntent.status === 'succeeded') {
                            // Payment succeeded
                            alert('Payment successful!');
                            // You can redirect or do something else here
                            // window.location.href = '/success';
                        }
                    }
                });
            })
            .catch(function(error) {
                console.error('Error:', error);
                document.getElementById('payButton').disabled = false;
            });
       
    </script>
</body>
</html>
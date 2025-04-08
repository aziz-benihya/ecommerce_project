<!DOCTYPE html>
<html>
<head>
    <title>Welcome to ZinWear Ecommerce Payment System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <style>
        /* Style moderne pour la page de paiement */
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        }
        
        .container {
            margin-top: 40px;
            margin-bottom: 40px;
        }
        
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-weight: 300;
            font-size: 2.5rem;
        }
        
        .panel-default {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .panel-default:hover {
            transform: translateY(-5px);
        }
        
        .panel-heading {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            color: white;
            border-radius: 12px 12px 0 0 !important;
            padding: 20px;
            border: none;
        }
        
        .panel-title {
            font-size: 1.5rem;
            font-weight: 500;
            text-align: center;
        }
        
        .panel-body {
            padding: 30px;
            background-color: white;
        }
        
        .form-control {
            height: 45px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 10px 15px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: #a777e3;
            box-shadow: 0 0 0 0.2rem rgba(167, 119, 227, 0.25);
        }
        
        label.control-label {
            color: #555;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            border: none;
            padding: 12px;
            font-size: 18px;
            font-weight: 500;
            border-radius: 8px;
            margin-top: 20px;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(110, 142, 251, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(110, 142, 251, 0.4);
        }
        
        .alert-success {
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 8px;
        }
        
        .alert-danger {
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 8px;
        }
        
        .error {
            margin-bottom: 20px;
        }
        
        /* Animation pour les champs de carte */
        .card-number, .card-cvc, .card-expiry-month, .card-expiry-year {
            background-position: right 15px center;
            background-repeat: no-repeat;
            background-size: 30px;
            padding-right: 50px;
        }
        
        .card-number {
            background-image: url('https://cdn.jsdelivr.net/gh/devicons/devicon/icons/creditcard/creditcard-original.svg');
        }
        
        .card-cvc {
            background-image: url('https://cdn.jsdelivr.net/gh/devicons/devicon/icons/lock/lock-original.svg');
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .col-md-6 {
                width: 100%;
                margin-left: 0;
            }
            
            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    
<div class="container">
    
    <h1>Welcome to ZinWear Ecommerce Payment System</h1>
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table">
                        <h3 class="panel-title">Payment Details</h3>
                </div>
                <div class="panel-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <form 
                            role="form" 
                            action="{{ route('stripe.post') }}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now </button>
                            </div>
                        </div>
                            
                    </form>
                </div>
            </div>        
        </div>
    </div>
        
</div>
    
</body>
    
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">
  
$(function() {
  
    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
    
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
</html>
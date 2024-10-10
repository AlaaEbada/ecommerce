<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <title>Famms - Fashion HTML Template</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <!-- Custom Styling -->
    <style>
        .cart-container {
            max-width: 100%;
            /* Full width */
            margin: 50px 20%;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .cart-header {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }

        .cart-table {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: collapse;
        }

        .cart-table th,
        .cart-table td {
            padding: 15px;
            border-bottom: 1px solid #e1e1e1;
            text-align: center;
        }

        .cart-table th {
            background-color: #f7444e;
            color: white;
            font-weight: bold;
        }

        .cart-item img {
            width: 80px;
            border-radius: 5px;
        }

        .quantity-input {
            width: 60px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .btn-remove {
            background-color: transparent;
            border: none;
            color: #f7444e;
            font-size: 1.2em;
            cursor: pointer;
        }

        .order-summary {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .order-summary h5 {
            font-size: 1.6em;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .order-summary table {
            width: 100%;
        }

        .order-summary table td {
            padding: 10px 0;
            font-size: 1.2em;
        }

        .summary-total {
            font-size: 1.8em;
            font-weight: bold;
            color: #f7444e;
            /* Highlighted total price color */
        }

        .btn-checkout {
            background-color: #f7444e;
            color: white;
            padding: 15px;
            width: 100%;
            text-align: center;
            font-size: 1.2em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .btn-checkout:hover {
            background-color: #931a26;
            color: #fff;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {

            .cart-table th,
            .cart-table td {
                font-size: 0.9em;
            }

            .btn-checkout {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Header Section -->
        @include('home.header')

        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ session()->get('message') }}
            </div>
        @endif

        <!-- Cart Section -->
        <div class="cart-container">
            <h1 class="cart-header">Shopping Cart</h1>

            <!-- Cart Items Table -->
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total_price = 0; ?>

                    @foreach ($cart as $cart)
                        <tr>
                            <td class="cart-item"><img src="/product/{{ $cart->image }}" alt="{{ $cart->title }}">
                            </td>
                            <td>{{$cart->product_title }}</td>
                            <td>${{$cart->price }}</td>
                            <td>
                                {{$cart->quantity }}
                            </td>
                            <td>${{ $cart->price * $cart->quantity }}</td>
                            <td><a href="{{ url('/remove_cart', $cart->id) }}"
                                onclick="confirmation(event)" ><i
                                        class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php $total_price = $total_price + $cart->price * $cart->quantity; ?>
                    @endforeach

                </tbody>
            </table>


            <!-- Order Summary Section -->
            <div class="order-summary">
                <h5>Order Summary</h5>
                <table>
                    <tr class="summary-total">
                        <td>Total</td>
                        <td>${{ $total_price }}</td>
                    </tr>
                </table>
                <h5 class="text-center text-gray-600">Procced To Order :</h5>
                <div class="text-center">
                    <a class="btn-checkout " href="{{ url('/cash_order') }}">Cash On Delivry</a>
                    <a class="btn-checkout " href="{{url("/stripe", $total_price)}}">Pay Uding card</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    @include('home.footer')

    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
    </div>

<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to cancel this product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                
                window.location.href = urlToRedirect;
                
            }  


        });

        
    }
</script>

<script src="home/js/jquery-3.4.1.min.js"></script>
<!-- popper js -->
<script src="home/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="home/js/bootstrap.js"></script>
<!-- custom js -->
<script src="home/js/custom.js"></script>

</body>

</html>

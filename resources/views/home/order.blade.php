<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    
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
        .order-container {
            max-width: 100%;
            margin: 50px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .order-container h1{
            font-size: 2em;
            font-weight: bold;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            align-content: center;
        }

        th {
            background-color: #f7444e;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f9ecec;
        }

        table img {
            width: 80px;
            height: auto;
            border-radius: 5px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .canceld
        {
            color: red;
            font-weight: bold;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            th, td {
                padding: 10px;
                font-size: 0.9em;
            }

            img {
                width: 60px;
            }
        }

        .delivered
        {
            color:green;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Header Section -->
        @include('home.header')

        <!-- Order Table Section -->
        <div class="order-container table-responsive">
            <h1 class="text-center mb-5">Your Orders</h1>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $order)
                    <tr>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>${{ $order->price }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td><img src="/product/{{ $order->image }}" alt="{{ $order->product_title }}"></td>
                        <td>
                            @if($order->delivery_status == 'Proccessing')

                            <a onclick="return confirm('Are You Sure You Want To Cansel The Order')" 
                            href={{url('/cansel_order', $order->id)}} class="btn btn-danger">Cansel Order</a> 

                            @elseif($order->delivery_status == 'Delivered')

                            <p class="delivered">Order Delivered</p>

                            @else

                            <p class="canceld">Order Canceld</p>

                            @endif
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>
    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>

</html>

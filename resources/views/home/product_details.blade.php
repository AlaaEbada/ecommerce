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
        header
        {
            background-color: #fff;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        .parent {
            max-width: 1100px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-content {
            display: flex;
            flex-wrap: wrap;
        }

        .product-image {
            flex: 1 1 40%;
            margin-right: 30px;
        }

        .product-image img {
            width: 100%;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .product-image img:hover {
            transform: scale(1.05);
        }

        .product-details {
            flex: 1 1 55%;
        }

        .product-details h1 {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .price {
            font-size: 1.5em;
            color: #f7444e;
            margin: 15px 0;
        }

        .price-discount {
            color: gray;
            text-decoration: line-through;
            margin-left: 10px;
        }

        .btn-add-cart {
            background-color: #f7444e;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
        }

        .btn-add-cart:hover {
            background-color: #dc3545;
        }

        .product-specifications table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .product-specifications th,
        .product-specifications td {
            padding: 10px;
            border: 1px solid #e1e1e1;
        }

        .product-specifications th {
            background-color: #f7444e;
            color: white;
        }

        .customer-reviews {
            margin-top: 50px;
        }

        .customer-review {
            display: flex;
            margin-bottom: 20px;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
        }

        .review-avatar img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .review-content h5 {
            margin: 0 0 5px;
            font-weight: bold;
        }

        .review-content .ratings {
            color: #f7444e;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .product-content {
                flex-direction: column;
            }

            .product-image {
                margin-right: 0;
            }

            .btn-add-cart {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('home.header')

    <!-- Product Section -->
    <div class="parent">
        <div class="product-content">
            <!-- Product Image -->
            <div class="product-image">
                <img src="/product/{{ $product->image }}" alt="{{ $product->title }}">
            </div>

            <!-- Product Details -->
            <div class="product-details">
                <h1>{{ $product->title }}</h1>

                <p class="price">
                    @if($product->discount_price)
                        ${{ $product->discount_price }} 
                        <span class="price-discount">${{ $product->price }}</span>
                    @else
                        ${{ $product->price }}
                    @endif
                </p>

                <p>{{ $product->description }}</p>

                <!-- Add to Cart -->
                <form action="{{ url('add_cart', $product->id) }}" method="POST">
                    @csrf
                    <div class="row" style="margin-top:10px">
                        <div class="col-md-4">
                            <input type="number" name="quantity" value="1" min="1" style="width:100%;">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn-add-cart">Add To Cart</button>
                        </div>
                    </div>
                </form>

                <!-- Product Specifications -->
                <div class="product-specifications">
                    <table>
                        <tr>
                            <th>Category</th>
                            <td>{{ $product->category }}</td>
                        </tr>
                        <tr>
                            <th>Available Quantity</th>
                            <td>{{ $product->quantity }}</td>
                        </tr>
                        <tr>
                            <th>Material</th>
                            <td>100% Cotton</td>
                        </tr>
                        <tr>
                            <th>Size</th>
                            <td>Medium</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Customer Reviews -->
        <div class="customer-reviews">
            <h2>Customer Reviews</h2>

            <div class="customer-review">
                <div class="review-avatar">
                    <img src="https://via.placeholder.com/60" alt="Customer">
                </div>
                <div class="review-content">
                    <h5>John Doe</h5>
                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half"></i>
                    </div>
                    <p>Amazing product! Highly recommend.</p>
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

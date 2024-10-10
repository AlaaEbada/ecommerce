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
        .product-container {
            display: flex;
            flex-wrap: wrap;
            margin: 40px auto;
            padding: 20px;
            max-width: 1100px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            flex: 1 1 40%;
            max-width: 40%;
            margin-right: 40px;
        }

        .product-image img {
            width: 100%;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .product-image img:hover {
            transform: scale(1.05);
        }

        .product-details {
            flex: 1 1 55%;
        }

        .product-details h5 {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .price {
            font-size: 1.6em;
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
            margin-top: 20px;
            transition: background-color 0.3s ease;
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

        /* Customer Reviews Styling */
        .customer-reviews {
            margin-top: 50px;
        }

        .customer-reviews h6 {
            font-size: 1.8em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .customer-review {
            display: flex;
            align-items: flex-start;
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.05);
        }

        .review-avatar {
            margin-right: 20px;
        }

        .review-avatar img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .review-content {
            flex: 1;
        }

        .review-content h5 {
            font-size: 1.2em;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .review-content .ratings {
            color: #f7444e;
        }

        .review-content p {
            margin: 5px 0;
            color: #555;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .product-container {
                flex-direction: column;
                padding: 20px;
            }

            .product-image {
                margin-right: 0;
                max-width: 100%;
            }

            .btn-add-cart {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Header Section -->
        @include('home.header')

        <!-- Product Section -->
        <div class="product-container">
            <!-- Product Image -->
            <div class="product-image">
                <img src="/product/{{ $product->image }}" alt="{{ $product->title }}">
            </div>

            <!-- Product Details -->
            <div class="product-details">
                <h5>{{ $product->title }}</h5>

                <!-- Price and Discount -->
                @if ($product->discount_price != null)
                    <h6 class="price">
                        ${{ $product->discount_price }}
                        <span class="price-discount">${{ $product->price }}</span>
                    </h6>
                @else
                    <h6 class="price" style="color:red;">
                        ${{ $product->price }}
                    </h6>
                @endif

                <!-- Product Description -->
                <p>{{ $product->description }}</p>

                <!-- Add to Cart Button -->
                <form action="{{ url('add_cart', $product->id) }}" method="POST">
                    @csrf
                    <div class="row" style="margin-top:10px">
                        <div class="col-md-4">
                            <input type="submit" value="Add To Cart">
                        </div>

                        <div class="col-md-4" style="margin-top:4px">
                            <input type="number" name="quantity" value="1" min="1" style="width:100px ">
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

        <!-- Customer Reviews Section -->
        <div class="customer-reviews">
            <h6>Customer Reviews</h6>

            <div class="customer-review">
                <div class="review-avatar">
                    <img src="https://via.placeholder.com/60" alt="Customer Avatar">
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
                    <p>Amazing product, great quality! Highly recommend it to everyone.</p>
                </div>
            </div>

            <div class="customer-review">
                <div class="review-avatar">
                    <img src="https://via.placeholder.com/60" alt="Customer Avatar">
                </div>
                <div class="review-content">
                    <h5>Jane Smith</h5>
                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <p>The product quality is fantastic! Would buy again.</p>
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Famms - Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- Responsive styles -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    
    <!-- Custom Styling -->
    <style>
        .blog-section {
            padding: 50px 0;
            background-color: #f9f9f9;
        }

        .blog-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .blog-header h2 {
            font-size: 40px;
            font-weight: bold;
            color: #333;
        }

        .blog-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
            transition: transform 0.3s;
        }

        .blog-card:hover {
            transform: translateY(-10px);
        }

        .blog-card img {
            border-radius: 10px 10px 0 0;
        }

        .blog-card-body {
            padding: 20px;
        }

        .blog-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .blog-excerpt {
            font-size: 1rem;
            color: #666;
            margin-bottom: 15px;
        }

        .read-more {
            font-size: 1rem;
            color: #f7444e;
            text-decoration: none;
        }

        .read-more:hover {
            color: #333;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Header Section -->
        @include('home.header')

        <!-- Blog Section -->
        <section class="blog-section">
            <div class="container">
                <div class="blog-header">
                    <h2>Latest Blog Posts</h2>
                </div>
                <div class="row">
                    <!-- Example Blog Post 1 -->
                    <div class="col-md-4">
                        <div class="card blog-card">
                            <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Blog Image">
                            <div class="card-body blog-card-body">
                                <h5 class="blog-title">The Latest Fashion Trends of 2024</h5>
                                <p class="blog-excerpt">Discover the top fashion trends that are defining this year. From bold patterns to sustainable materials, stay updated with what's hot in fashion...</p>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Example Blog Post 2 -->
                    <div class="col-md-4">
                        <div class="card blog-card">
                            <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Blog Image">
                            <div class="card-body blog-card-body">
                                <h5 class="blog-title">How to Style Your Wardrobe for Fall</h5>
                                <p class="blog-excerpt">Learn how to transition your wardrobe for the cooler fall months. From layering techniques to the perfect autumn colors, find the best style tips...</p>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Example Blog Post 3 -->
                    <div class="col-md-4">
                        <div class="card blog-card">
                            <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Blog Image">
                            <div class="card-body blog-card-body">
                                <h5 class="blog-title">Sustainable Fashion: What You Need to Know</h5>
                                <p class="blog-excerpt">Sustainability is the future of fashion. Learn about eco-friendly brands and practices that are making a positive impact on the environment...</p>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
        @include('home.footer')

        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
            </p>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('home/js/custom.js') }}"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Famms - Blog</title>

    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.css') }}" />
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

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
        .article
        {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')

        <section class="blog-section">
            <div class="container">
                <div class="blog-header">
                    <h2>Latest Blog Posts</h2>
                </div>
                <div class="row">
                    @foreach($posts as $post)
                    <div class="col-md-4 article">
                        <div class="card blog-card">
                            <img src="{{ asset('post/' . $post->featured_image) }}" class="card-img-top" alt="{{ $post->title }}">
                            <div class="card-body blog-card-body">
                                <h5 class="blog-title">{{ $post->title }}</h5>
                                <p class="blog-excerpt">{{ Str::limit($post->content, 100) }}</p>
                                <a href="{{url('/post', $post->id)}}" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        @include('home.footer')

        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
            </p>
        </div>
    </div>

    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>

</body>

</html>

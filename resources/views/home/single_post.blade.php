<!DOCTYPE html>
<html lang="en">

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

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- Font Awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- Responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <!-- Custom Styling -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Post Section */
        .parent {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .post-title {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }

        .post-date {
            color: gray;
            margin-bottom: 20px;
            font-size: 0.9em;
        }

        .post-content {
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .post-content img {
            width: 100%; /* Full width of its container */
            height: 400px; /* Fixed height for rectangular shape */
            object-fit: cover; /* Ensures the image covers the area while maintaining aspect ratio */
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
}
    

        .author-section {
            margin-top: 30px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .author-name {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 1.1em;
        }

        .author-bio {
            color: #555;
            font-size: 0.95em;
        }

        /* Comments Section */
        .comments-section {
            margin-top: 40px;
        }

        .comment {
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .comment h5 {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .comment p {
            color: #555;
        }

        /* Footer */
        .cpy_ {
            text-align: center;
            padding: 15px;
            font-size: 0.9em;
            color: #666;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .parent {
                margin: 20px;
                padding: 15px;
            }

            .post-title {
                font-size: 2em;
            }

            .post-date {
                font-size: 0.8em;
            }

            .author-section {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    @include('home.header')

    <!-- Post Section -->
    <div class="parent">
        <h1 class="post-title">{{ $post->title }}</h1>
        <p class="post-date">{{ $post->created_at->format('F j, Y') }}</p>

        <div class="post-content">
            <img  src="{{ asset('post/' . $post->featured_image) }}" alt="{{ $post->title }}">
            <p>{{ $post->content }}</p>
        </div>

        <div class="author-section">
            <p class="author-name">Written by: {{ $post->user->name ?? 'Unknown' }}</p>
            <p class="author-bio">{{ $post->author_bio }}</p>
        </div>
    </div>

    <!-- Footer Section -->
    @include('home.footer')

    <div class="cpy_">
        <p>© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
    </div>

    <!-- jQuery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- Popper JS -->
    <script src="home/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="home/js/bootstrap.js"></script>
    <!-- Custom JS -->
    <script src="home/js/custom.js"></script>
</body>

</html>

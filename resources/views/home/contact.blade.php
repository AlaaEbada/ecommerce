<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Contact Us - Famms</title>

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
        .contact-container {
            padding: 60px 0;
            background-color: #f9f9f9;
        }

        .contact-header {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 40px;
            text-align: center;
            color: #333;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #f7444e;
        }

        .btn-submit {
            background-color: #f7444e;
            color: white;
            padding: 15px;
            width: 100%;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #e63939;
        }

        .map-container {
            margin-top: 50px;
        }

        .map-responsive {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Header Section -->
        @include('home.header')

        <!-- Contact Section -->
        <div class="contact-container">
            <div class="container">
                <h2 class="contact-header">Contact Us</h2>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-container">
                            <form action="{{ url('/submit_contact') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Your Name" required />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Your Email" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" placeholder="Subject" required />
                                </div>
                                <div class="form-group">
                                    <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
                                </div>
                                <button type="submit" class="btn-submit">Send Message</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="map-container">
                            <h4>Find Us</h4>
                            <div class="map-responsive">
                                <iframe src="https://maps.google.com/maps?q=your-location-address-here&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
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

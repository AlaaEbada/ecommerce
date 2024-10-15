<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        body {
            background-color: #000; /* Black background */
            font-family: Arial, sans-serif; /* Clean font */
            color: #fff; /* White text for contrast */
        }

        .div_center {
            text-align: center;
            padding: 40px 0;
        }

        .h2_form {
            font-size: 36px; /* Title size */
            margin-bottom: 20px;
        }

        .input_color {
            width: 100%; /* Full width for inputs */
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #444; /* Dark border */
            border-radius: 4px; /* Rounded corners */
            background-color: #222; /* Dark input background */
            color: #fff; /* White text for inputs */
            transition: border-color 0.3s; /* Transition for focus */
        }

        .input_color:focus {
            border-color: #007bff; /* Highlight border on focus */
            outline: none; /* Remove default outline */
        }

        .submit_ct {
            background-color: #28a745; /* Green button */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px; /* Rounded corners */
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s; /* Smooth hover effect */
        }

        .submit_ct:hover {
            background-color: #218838; /* Darker green on hover */
        }

        label {
            display: block; /* Block display for labels */
            margin: 10px 0 5px; /* Spacing around labels */
            font-weight: bold; /* Bold labels */
        }

        .div_design {
            padding: 10px; /* Padding for form elements */
        }

        .alert {
            margin-top: 20px; /* Spacing above alert */
            border-radius: 4px; /* Rounded corners for alerts */
            padding: 10px;
            color: #fff; /* White text for alerts */
        }

        .center {
            margin: auto;
            width: 80%; /* Adjusted width for form container */
            display: flex; /* Flexbox for layout */
            flex-direction: column;
            background-color: #333; /* Darker background for form */
            border-radius: 8px; /* Rounded corners for the form */
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1); /* Light shadow for form */
            padding: 20px; /* Padding inside the form */
        }

        .content_area {
            flex: 3; /* Content area takes up more space */
            padding-right: 20px; /* Spacing between content and sidebar */
        }

        .sidebar {
            flex: 1; /* Sidebar takes less space */
            padding-left: 20px; /* Spacing for sidebar */
            border-left: 1px solid #444; /* Left border for separation */
        }
        
        .text_black {
            color: #000;
        }

        .current_image {
            width: 80px; 
            height: 80px; 
            object-fit: cover; 
            margin-top: 10px;
        }
        .content_sec {
            height: 500px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- Sidebar -->
        @include('admin.sidebar')
        <!-- Main Content -->
        <div class="container-fluid page-body-wrapper">
            <!-- Navbar -->
            @include('admin.header')
            <div class="main-panel">
                <div class="content-wrapper">

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif

                    <div class="div_center">
                        <h2 class="h2_form">Edit Post</h2>

                        <div class="center">
                            <form action="{{ url('/update_post', $post->id) }}" method="POST" enctype="multipart/form-data" style="display: flex">
                                @csrf

                                <div class="content_area">
                                    <div class="div_design">
                                        <label for="content">Content:</label>
                                        <textarea class="input_color content_sec" name="content" id="content" placeholder="Write a description" required>{{ $post->content }}</textarea>
                                    </div>
                                </div>

                                <div class="sidebar">
                                    <div class="div_design">
                                        <label for="title">Title:</label>
                                        <input type="text" class="input_color text_black" name="title" value="{{ $post->title }}" placeholder="Write A Title" required>
                                    </div>

                                    <div class="div_design">
                                        <label for="slug">Slug:</label>
                                        <input type="text" id="slug" name="slug" class="input_color text_black" value="{{ $post->slug }}" placeholder="Write a slug" required>
                                    </div>

                                    <div class="div_design">
                                        <label for="category">Product Category:</label>
                                        <select class="input_color" name="category" id="category" required>
                                            <option value="" selected>Select a Category</option>
                                            @foreach ($category as $category)
                                                <option value="{{ $category->category_name }}" {{ $post->category == $category->category_name ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="div_design">
                                        <label for="featured_image">Featured Image:</label>
                                        <input type="file" id="featured_image" name="featured_image" class="input_color">
                                        <img src="{{ asset('post/' . $post->featured_image) }}" alt="Current Image" class="current_image">
                                    </div>

                                    <div class="div_design">
                                        <input type="submit" class="submit_ct" name="submit" value="Update Post">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Container-scroller -->
            @include('admin.script')
            <!-- End custom js for this page -->
        </div>
    </div>
</body>

</html>

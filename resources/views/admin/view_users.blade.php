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

        .user_card {
            background-color: #333; /* Dark background for user cards */
            border-radius: 8px; /* Rounded corners for cards */
            padding: 20px; /* Padding inside the cards */
            margin: 10px; /* Spacing between cards */
            display: flex; /* Flexbox for layout */
            justify-content: space-between; /* Space between elements */
            align-items: center; /* Center align items */
        }

        .button {
            background-color: #28a745; /* Green button */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px; /* Rounded corners */
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth hover effect */
        }

        .delete
        {
            padding: 10px 20px;

        }

        .button:hover {
            background-color: #218838; /* Darker green on hover */
        }

        .add_user {
            background-color: #007bff; /* Blue button for adding user */
            margin-top: 20px; /* Spacing above button */
        }

        .add_user:hover {
            background-color: #0069d9; /* Darker blue on hover */
        }

        .alert {
            margin-top: 20px; /* Spacing above alert */
            border-radius: 4px; /* Rounded corners for alerts */
            padding: 10px;
        }

        .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
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
                        {{ session()->get('message') }}
                    </div>
                    @elseif (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                    <div class="div_center">
                        <h2 class="h2_form">User Management</h2>
                        <div class="pb-5 pt-4">
                            <!-- Add New User Button -->
                            <a href="{{ url('/add_user') }}" class="button add_user">Add New User</a>
                        </div>

                        <!-- Current User Information -->
                        <div class="user_card">
                            <div>
                                <strong>Current User:</strong> {{ Auth::user()->name }}<br>
                                <strong>Email:</strong> {{ Auth::user()->email }}
                            </div>
                            <a href="{{ url('/edit_user', Auth::user()->id) }}" class="button">Edit My Info</a>
                        </div>

                        <!-- List of Users -->
                        <h3>All Users</h3>
                        @foreach ($users as $user)
                        @if($user != Auth::user())

                            <div class="user_card">
                                <div>
                                    <strong>Name:</strong> {{ $user->name }}<br>
                                    <strong>Email:</strong> {{ $user->email }}
                                </div>
                                <div>
                                    <a href="{{ url('/edit_user', $user->id) }}" class="button mr-2">Edit</a>


                                    <a  onclick="return confirm('Are You Sure You Want To Delete This')"
                                    href="{{ url('/delete_user', $user->id) }}" class="btn btn-danger delete" 
                                    >Delete</a>

                            
                                </div>
                            </div>
                            @endif    
                        @endforeach

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

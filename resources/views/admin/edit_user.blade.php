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
            color: #000; /* White text for inputs */
            transition: border-color 0.3s; /* Transition for focus */
            position: relative; /* Position relative for the eye icon */
        }

        .input_color:focus {
            border-color: #007bff; /* Highlight border on focus */
            outline: none; /* Remove default outline */
        }

        .eye-icon {
            position: absolute; /* Position the icon within the input */
            right: 10px; /* Right padding */
            top: 50%; /* Center vertically */
            transform: translateY(-50%); /* Adjust vertical position */
            cursor: pointer; /* Change cursor to pointer */
            color: #fff; /* White color for the icon */
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
            width: 60%; /* Width for form container */
            background-color: #333; /* Darker background for form */
            border-radius: 8px; /* Rounded corners for the form */
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1); /* Light shadow for form */
            padding: 20px; /* Padding inside the form */
        }
    </style>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '👁️'; // Eye open icon
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁️‍🗨️'; // Eye closed icon
            }
        }
    </script>
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
                        <h2 class="h2_form">Edit User</h2>

                        <div class="center">
                            <form action="{{ url('/update_user', $user->id) }}" method="POST">
                                @csrf

                                <div class="div_design">
                                    <label for="name">Name:</label>
                                    <input type="text" class="input_color" name="name" value="{{ $user->name }}" placeholder="Enter User Name" required>
                                </div>

                                <div class="div_design">
                                    <label for="email">Email:</label>
                                    <input type="email" class="input_color" name="email" value="{{ $user->email }}" placeholder="Enter User Email" required>
                                </div>

                                <div class="div_design">
                                    <label for="address">Address:</label>
                                    <input type="text" class="input_color" name="address" value="{{ $user->address }}" placeholder="Enter User Address" required>
                                </div>    

                                <div class="div_design">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="input_color" name="phone" value="{{ $user->phone }}" placeholder="Enter User Phone">
                                </div>

                                <div class="div_design">
                                    <label for="password">Password:</label>
                                    <div style="position: relative;">
                                        <input type="password" id="password" class="input_color" name="password" placeholder="Enter User Password" required>
                                        <span id="eye-icon" class="eye-icon" onclick="togglePassword()">👁️‍🗨️</span>
                                    </div>
                                </div>

                                <div class="div_design">
                                    <label for="role">Role:</label>
                                    <select class="input_color text-white" name="role" required>
                                        <option value="" >Select Role</option>
                                        <option value="admin" {{ $user->usertype == 1 ? 'selected' : '' }} >Admin</option>
                                        <option value="user" {{ $user->usertype == 0 ? 'selected' : '' }} >User</option>
                                    </select>
                                </div>

                                <div class="div_design">
                                    <input type="submit" class="submit_ct" value="Update User">
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

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')
</head>
<style>
    label {
        display: inline-block;
        width: 150px;
        font-size: 15px;
        font-weight: 600;
    }
</style>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <h1 class="text-center text-2xl">Send Email To {{ $order->email }}</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ url('send_user_email', $order->id) }}" method="POST">
                        @csrf

                        <div class="text-center pt-5">
                            <label for="email">Email Greeting :</label>
                            <input type="text" class="text-black" name="greeting" required />
                        </div>

                        <div class="text-center pt-4">
                            <label for="email">Email First Line :</label>
                            <input type="text" class="text-black" name="firstline" required />
                        </div>

                        <div class="text-center pt-4">
                            <label for="email">Email Body :</label>
                            <textarea class="text-black" name="emailbody" required></textarea>
                        </div>

                        <div class="text-center pt-4">
                            <label for="email">Email Button Name:</label>
                            <input type="text" class="text-black" name="button" required />
                        </div>

                        <div class="text-center pt-4">
                            <label for="email">Email URL:</label>
                            <input type="text" class="text-black" name="url" required />
                        </div>

                        <div class="text-center pt-4">
                            <label for="email">Email Last Line:</label>
                            <input type="text" class="text-black" name="lastline" required />
                        </div>

                        <div class="text-center pt-4">
                            <input type="submit" value="Send Email" class="btn btn-primary" />
                        </div>
                    </form>

                </div>
            </div>
            <!-- container-scroller -->
            <!-- plugins:js -->
            @include('admin.script')
            <!-- End custom js for this page -->
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_form {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .input_color {
            color: #000
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 1px solid white;
        }

        .submit_ct {
            background-color: green;
            padding: 10px 20px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 10px;
        }
    </style>
</head>

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

                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="div_center">
                        <h2 class="h2_form">Add Product</h2>


                        <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="div_design">
                                <label>Product Title :</label>
                                <input type="text" class="input_color" name="title" placeholder="Write A Title "
                                    required="">
                            </div>

                            <div class="div_design">
                                <label>Product Description :</label>
                                <input type="text" class="input_color" name="description"
                                    placeholder="Write A description" required="">
                            </div>

                            <div class="div_design">
                                <label>Product Price :</label>
                                <input type="number" class="input_color" name="price" placeholder="Write A price"
                                    required="">
                            </div>

                            <div class="div_design">
                                <label>Discount Price :</label>
                                <input type="number" class="input_color" name="discount_price"
                                    placeholder="Write A Discount price">
                            </div>

                            <div class="div_design">
                                <label>Product Quantity :</label>
                                <input type="number" min="0" class="input_color" name="quantity"
                                    placeholder="Write A Quantity" required="">
                            </div>


                            <div class="div_design">
                                <label>Product Category :</label>
                                <select class="input_color" name="category" id="" required="">
                                    <option value="null" selected="">Select a Category</option>

                                    @foreach ($category as $category)
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="div_design">
                                <label>Product Image Here :</label>
                                <input type="file" name="image">
                            </div>

                            <div class="div_design">
                                <input type="submit" class="submit_ct" name="submit" value="Add Product"
                                    required="">
                            </div>

                        </form>

                    </div>


                </div>
            </div>
            <!-- container-scroller -->
            <!-- plugins:js -->
            @include('admin.script')
            <!-- End custom js for this page -->
</body>

</html>

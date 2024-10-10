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
            .img_size
            {
                max-width:200px;
                height:200px;
            }

            .tr_header
            {
                background-color: #333
            }
            .tr_des
            {
                padding: 30px
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
                            <h2 class="h2_form">Show Products</h2>
                        </div>

                        <table class="center ">
                            <tr class="tr_header">
                                <td class="tr_des">Product Title</td>
                                <td class="tr_des">Description</td>
                                <td class="tr_des">Quantity</td>
                                <td class="tr_des">Category</td>
                                <td class="tr_des">price</td>
                                <td class="tr_des">Discount Price</td>
                                <td class="tr_des">Product Image</td>
                                <td class="tr_des">Delete</td>
                                <td class="tr_des">Edit</td>
                            </tr>

                            @foreach ($product as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td><img class="img_size" src="/product/{{ $product->image }}" alt=""></td>

                                <td><a onclick="return confirm('Are you sure you want to delete this item?');"
                                    class="btn btn-danger"
                                    href="{{url('delete_product', $product->id)}}">Delete</a>
                                </td>

                                <td><a href="{{url('/update_product', $product->id)}}" class="btn btn-success">Edit</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- container-scroller -->
                <!-- plugins:js -->
                @include('admin.script')
                <!-- End custom js for this page -->
    </body>

    </html>

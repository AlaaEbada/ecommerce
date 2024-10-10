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

        .tabel {
            margin: auto;
            text-align: center;
            margin-top: 30px;
            border: 1px solid white;
        }
        
        .tr_header
        {
            background-color: #333
        }

        
        .tabel tr td
        {
            padding: 20px 10px;
        }

        .tabel tr th
        {
            padding: 20px 10px;
        }
        .img_size
        {
            width:50px;;
        }
        .serach_bar
        {
            border-radius: 5px !important;
            width : 500px;
        }
        .btn-outline-success
        {
            height: 40px;
            width: 100px;
            margin-left:10px;
            margin-bottom:4px;
            border-radius: 5px !important;
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
                        <h2 class="h2_form">Orders</h2>

                        <div class="search_bar" style="margin-bottom: ">
                            <form action="{{url('/search')}}" method="GET">

                                <input type="text" name="search" placeholder="Search for Something" class="input_color serach_bar">
                                <input type="submit" value="Search" class="btn btn-outline-success">

                            </form>


                        </div>
                    </div>
                    <table class=" tabel">
                        <tr class="tr_header">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Image</th>
                            <th>Deliverd</th>
                            <th>Print PDF</th>
                            <th>Send Email</th>
                        </tr>
                        @forelse ($order as $order)
                        <tr>
                            <td> {{$order->name}} </td>
                            <td> {{$order->email}} </td>
                            <td> {{$order->address}} </td>
                            <td> {{$order->phone}} </td>
                            <td> {{$order->product_title}} </td>
                            <td> {{$order->quantity}} </td>
                            <td> {{$order->price}} </td>
                            <td> {{$order->payment_status}} </td>
                            <td> {{$order->delivery_status}} </td>
                            <td> <img class="img_size" src="/product/{{$order->image}}" alt=""> </td>
                            <td>
                                @if ($order->delivery_status == "Proccessing")
                                
                                <a href="{{url('/delivered', $order->id)}}" onclick="return confirm('Are You Sure This Product Is Delivered')" class="btn btn-primary">Delivred</a>

                                @elseif($order->delivery_status == "You canseled the order")

                                <p style="color: red; font-weight:bold;">Canseled</p>

                                @else
                                <p style="color: green; font-weight:bold;">Delivered</p>
                                @endif
                            </td>
                            
                            <td>
                                <a href="{{url('/print_pdf', $order->id)}}" class="btn btn-success">Print PDF</a>
                            </td>
                            
                            <td>
                                <a href="{{url('/send_email', $order->id)}}" class="btn btn-info">Send Email</a>
                            </td>

                            @empty

                            <tr>
                                <td colspan="16">No Data Found</td>
                            </tr>
                        @endforelse
                        </table>
                </div>
            </div>
            <!-- container-scroller -->
            <!-- plugins:js -->
            @include('admin.script')
            <!-- End custom js for this page -->
</body>

</html>

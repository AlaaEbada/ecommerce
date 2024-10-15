<section class="product_section layout_padding" id="products">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>

        <div class="search">
            <form action="{{url('/product_search')}}" method="GET">
                <input type="text" placeholder="Search for something" name="search">
                <input type="submit" value="Search">
            </form>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success mt-3" >
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="row">
        @foreach ($product as $products)
        
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{url('product_details', $products->id)}}" class="option1">
                                Product Details
                            </a>
                            <form action="{{url("add_cart", $products->id)}}" method="POST">
                                @csrf
                                <div class="row" style="margin-top:10px">

                                    <div class="col-md-4" style="margin-top:4px"> 
                                        <input type="number" name="quantity" value="1" min="1" 
                                        style="width:100px ">  
                                    </div>

                                    <div class="col-md-4">
                                        <input type="submit" value="Add To Cart" >
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="img-box">
                        <img src="/product/{{ $products->image }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$products->title}}
                        </h5>

                        @if($products->discount_price != null)
                        <h6>
                            <span style="
                                color:gray; text-decoration:line-through; padding-right:10px"> 

                                ${{$products->price}} 
                            
                            </span> 
                            
                            <span style=" color:#f7444e;"> ${{$products->discount_price}} </span>

                        </h6>

                        @else
                        <h6 style="
                                color:red;">
                            ${{$products->price}}
                        </h6>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="btn-box">
            <a href="{{url('/products')}}">
                View All products
            </a>
        </div>
    </div>
</section>

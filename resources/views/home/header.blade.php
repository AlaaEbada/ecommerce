<!-- header section starts -->
<header class="header_section">
   <div class="container">
      <nav class="navbar navbar-expand-lg custom_nav-container">
         <a class="navbar-brand" href="{{url("/")}}"><img width="250" src="/home/images/logo.png" alt="#" /></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class=""> </span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url("/")}}">Home <span class="sr-only">(current)</span></a>
               </li>

               <li class="nav-item {{ Request::is('products') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url('/products')}}">Products</a>
               </li>

               <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url('/blog')}}">Blog</a>
               </li>

               <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url('/contact')}}">Contact</a>
               </li>

               <li class="nav-item {{ Request::is('show_cart') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url('/show_cart')}}" style="display: flex;">Cart 
                     <span class="ml-2" style="color:red"> @if($cart_items != 0)[{{$cart_items}}]@endif</span></a>
                  
               </li>

               <li class="nav-item {{ Request::is('show_order') ? 'active' : '' }}">
                  <a class="nav-link" href="{{url('/show_order')}}">Order</a>
               </li>

               <form class="form-inline">
                  <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                     <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
               </form>

               @if (Route::has('login'))
                  @auth
                     <li class="nav-item">
                        <x-app-layout></x-app-layout>
                     </li>
                  @else
                     <li class="nav-item">
                        <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Log In</a>
                     </li>
                     <li class="nav-item">
                        <a class="btn btn-success" id="registercss" href="{{ route('register') }}">Register</a>
                     </li>
                  @endauth
               @endif

               @if(Auth::check() && Auth::user()->usertype == '1')
                  <li class="nav-item pl-3">
                     <a class="btn btn-secondary" style="background-color:#fff; color: #777777; border-color:#d8d8d8;"
                        id="dashboardcss" href="{{ url('/redirect') }}">Dashboard</a>
                  </li>
               @endif
            </ul>
         </div>
      </nav>
   </div>
</header>

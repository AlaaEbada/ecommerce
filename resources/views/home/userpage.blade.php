<!DOCTYPE html>
<html>

<head>
   <!-- Basic -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Site Metas -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
   <title>Famms - Fashion HTML Template</title>

   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
   <!-- font awesome style -->
   <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
   <!-- responsive style -->
   <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
   <!-- Custom Styling -->
   <style>
      /* Default link styling */
/* Default link styling */
.nav-link {
   color: #333;
   font-weight: normal;
   transition: color 0.3s ease;
   border-bottom: none; /* Ensure no border is applied by default */
}

/* Hover effect */
.nav-link:hover {
   color: #f7444e;
   text-decoration: none;
}

/* Active link styling */
.nav-item.active .nav-link {
   color: #f7444e;
   font-weight: bold;
   border-radius: 0 !important;
   padding-bottom: 3px; /* Adjust to create spacing for the border */
}

   



   </style>

   
</head>

<body>
   
   @include('sweetalert::alert')

   <div class="hero_area">
      <!-- start header section -->
      @include('home.header')
      <!-- end header section -->
      <!-- slider section -->
      @include('home.slider')
      <!-- end slider section -->
   </div>
   <!-- why section -->
   @include('home.why')
   <!-- end why section -->

   <!-- arrival section -->
   @include('home.arrival')
   <!-- end arrival section -->

   <!-- product section -->
   @include('home.product')
   <!-- end product section -->

   <!-- Start Comment section -->

   @include('home.comment')

   <!-- End Comment section -->

   <!-- subscribe section -->
   @include('home.subscribe')
   <!-- end subscribe section -->
   <!-- client section -->
   @include('home.client')
   <!-- end client section -->
   <!-- footer start -->
   @include('home.footer')
   <!-- footer end -->
   <div class="cpy_">
      <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

         Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

      </p> 
   </div>

   <script type="text/javascript">
      function reply(caller) {

         document.getElementById("commentId").value = $(caller).attr("data-commentid");

         $(".reply_div").insertAfter($(caller));

         $(".reply_div").show();
      }

      function reply_close(caller) {
         $(".reply_div").hide();
      }
   </script>

   <script>
      document.addEventListener("DOMContentLoaded", function () {
      const searchIcon = document.getElementById('searchIcon');
      const searchContainer = document.getElementById('searchContainer');
      const closeSearch = document.getElementById('closeSearch');

      // إظهار شريط البحث عند النقر على أيقونة البحث
      searchIcon.addEventListener('click', function () {
         searchContainer.style.display = 'block';
         setTimeout(() => {
               searchContainer.style.opacity = '1'; // يمكن إضافة تأثير للشفافية إذا رغبت
         }, 10);
      });

      // إخفاء شريط البحث عند النقر على زر الإغلاق
      closeSearch.addEventListener('click', function () {
         searchContainer.style.opacity = '0'; // إضافة تأثير للشفافية
         setTimeout(() => {
               searchContainer.style.display = 'none';
         }, 300); // مدة الإخفاء متطابقة مع CSS
      });
   });

   </script>


<script>
   
</script>


{{-- Its For Smooth scrolling --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>


<script type="text/javascript">
   $(document).ready(function () {
      // استعادة موضع التمرير فقط إذا لم تكن الصفحة قد تم إعادة تحميلها
      if (performance.navigation.type !== performance.navigation.TYPE_RELOAD) {
         if (localStorage.getItem("my_app_name_here-quote-scroll") != null) {
               $(window).scrollTop(localStorage.getItem("my_app_name_here-quote-scroll"));
         }
      }
   
      $(window).on("scroll", function() {
         localStorage.setItem("my_app_name_here-quote-scroll", $(window).scrollTop());
      });
   });
   </script>
   




   <!-- jQery -->
   <script src="home/js/jquery-3.4.1.min.js"></script>
   <!-- popper js -->
   <script src="home/js/popper.min.js"></script>
   <!-- bootstrap js -->
   <script src="home/js/bootstrap.js"></script>
   <!-- custom js -->
   <script src="home/js/custom.js"></script>
</body>

</html>

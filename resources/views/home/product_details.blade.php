<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      {{-- <base href="/public"> --}}
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%; padding:30px;">
        
           <div class="img-box" style="padding: 10px;align-items:center;">
              <img src="/product/{{ $product->image }}" style="width:500px;" alt="">
           </div>
           <div class="detail-box">
              <h5>
                {{$product->name}}
              </h5>
              @if($product->discount_price!=null)
                 <h6 style="color:red;">
                    Discount Price
                    <br>
                    {{ $product->discount_price }}
                 </h6>

                 <h6 style="text-decoration:line-through;color:blue;">
                    Price
                    <br>
                    ${{ $product->price }}
                 </h6>

              @else
                 <h6>
                    Price
                    <br>
                    ${{ $product->price }}
                 </h6>
              @endif
              
                 <h6>Product Category    : {{ $product->category }}</h6>
                 <h6>Product Description : {{ $product->description }}</h6>
                 <h6>Available Quantity  : {{ $product->quantity }}</h6>

                 <form action="{{ url('add_cart',$product->id) }}" method="POST">
                  @csrf
                  <div class="row">
                     <div class="col-md-4">
                        <input type="number" name="quantity" value="1" min="1">
                     </div>
                     <div class="col-md-4" style="width: 75px;">
                        <input type="submit" value="Add to Cart">
                     </div>
                  </div>
               </form>
           </div>
        </div>
     </div>
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
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
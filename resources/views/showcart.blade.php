<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <title>Klassy Cafe - Restaurant HTML Template</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{asset('/')}}frontend/assets/css/font-awesome.css">

    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/owl-carousel.css">

    <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/lightbox.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="{{asset('/')}}frontend/assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 
                          
                            <li class="scroll-to-section" style="display: flex; align-items: center; gap: 6px;">
                                <i class="fa fa-shopping-cart" style="color: red; font-size: 18px;"></i>
                            
                                @auth
                                    <a href="{{ url('/showcart', Auth::user()->id) }}" style="text-decoration: none; color: inherit;">
                                        [{{ $count }}]
                                    </a>
                                @endauth
                            
                                @guest
                                    <span>[0]</span>
                                @endguest
                            </li>

                            <li>

                            @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                @auth
                                <li>
                                    <x-app-layout>

                                    </x-app-layout>
                                </li>
                               
                                
                                @else
                                    <li>
                                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a> 
                                    </li>
                                    
            
                                    @if (Route::has('register'))
                                        <li> <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                                       
                                    @endif
                                @endauth

                                
                                
                             </div>
                        @endif
                        
                        
                    </li>
                        </ul>        
                        {{-- <a class='menu-trigger'>
                            <span>Menu</span>
                        </a> --}}
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

   <div id="top">
    <div class="row justify-content-center">
        <div class="col-10 grid-margin stretch-card">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Food Table</h4>

                    <div class="table-responsive" style="display: flex; justify-content: center;">
                        <table class="table table-hover table-bordered text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Food Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form accept="{{ url('orderconfirm') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                @foreach($carts as $cart)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <input type="text" name="foodname[]" value="{{ $cart->title }}" hidden="">
                                            {{ $cart->title }}
                                        </td>
                                        <td>
                                            <input type="text" name="price[]" value="{{ $cart->price }}" hidden="">
                                            {{ $cart->price }}
                                        </td>
                                        <td>
                                            <input type="text" name="quantity[]" value="{{ $cart->quantity }}" hidden="">
                                            {{ $cart->quantity }}
                                        </td>
                                      
                                       
                                       
                                    </tr>
                                @endforeach

                                @foreach($cartitems as $cartitem)
                                <tr style="position: relative; top: -60px; right: -860px; border: 1px solid #ddd; padding: 10px;">
                                    <td>
                                        <a href="{{ url('/remove', $cartitem->id) }}" class="btn btn-sm btn-warning">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                            
                            </tbody>
                        </table>

                       
                    </div>
                    <div align="center" style="padding: 10px">
                        <button class=" btn btn-primary" type="button" id="order" >Order Now</button>
                    </div>

                    <div id="appear" class="row mb-5" style="display: none">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">order Form</h4>
  
                                  
                                        <div class="form-group">
                                            <label for="title">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Title">
                                        </div>
  
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Price">
                                        </div>
  
  
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="4" placeholder="Enter food description..."></textarea>
                                        </div>
  
                                        <button type="submit" class="btn btn-primary me-2">Order Confirm</button>
                                        <button type="reset" id="close" type="button" class="btn btn-secondary">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
   </div>

    
<script type="text/javascript">
$("#order").click(
    function(){
        $("#appear").show();
    }
);
$("#close").click(
    function(){
        $("#appear").hide();
    }
);

</script>


      <!-- jQuery -->
      <script src="{{asset('/')}}frontend/assets/js/jquery-2.1.0.min.js"></script>

      <!-- Bootstrap -->
      <script src="{{asset('/')}}frontend/assets/js/popper.js"></script>
      <script src="{{asset('/')}}frontend/assets/js/bootstrap.min.js"></script>
  
      <!-- Plugins -->
      <script src="{{asset('/')}}frontend/assets/js/owl-carousel.js"></script>
      <script src="{{asset('/')}}frontend/assets/js/accordions.js"></script>
      <script src="{{asset('/')}}frontend/assets/js/datepicker.js"></script>
      <script src="{{asset('/')}}frontend/assets/js/scrollreveal.min.js"></script>
      <script src="{{asset('/')}}frontend/assets/js/waypoints.min.js"></script>
      <script src="{{asset('/')}}frontend/assets/js/jquery.counterup.min.js"></script>
      <script src="{{asset('/')}}frontend/assets/js/imgfix.min.js"></script> 
      <script src="{{asset('/')}}frontend/assets/js/slick.js"></script> 
      <script src="{{asset('/')}}frontend/assets/js/lightbox.js"></script> 
      <script src="{{asset('/')}}frontend/assets/js/isotope.js"></script> 
      
      <!-- Global Init -->
      <script src="{{asset('/')}}frontend/assets/js/custom.js"></script>
      <script>
  
          $(function() {
              var selectedClass = "";
              $("p").click(function(){
              selectedClass = $(this).attr("data-rel");
              $("#portfolio").fadeTo(50, 0.1);
                  $("#portfolio div").not("."+selectedClass).fadeOut();
              setTimeout(function() {
                $("."+selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
              }, 500);
                  
              });
          });
  
      </script>
    </body>
  </html>
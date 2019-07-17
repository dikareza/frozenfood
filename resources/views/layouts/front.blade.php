<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Frozen Food</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ URL::asset('web/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ URL::asset('web/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin_theme/lib/datatables/css/dataTables.bootstrap.min.css') }}"/>
<!-- font-awesome icons -->
<!-- <link href="{{ URL::asset('web/css/font-awesome.css') }}" rel="stylesheet" type="text/css" media="all" />  -->
<!-- //font-awesome icons -->
<!-- js -->
<script src="{{ URL::asset('admin_theme/lib/jquery/jquery.min.js') }}"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<!-- font awesome -->
<link rel="stylesheet" href="{{ URL::asset('css/css/font-awesome.css') }}" type="text/css" media="all" />

<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ URL::asset('web/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('web/js/easing.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="w3l_offers">
	<a href="{{url('/home')}}"><img style="height: 46px;width: 164.9px" src="{{ URL::asset('image/new-logo.png') }}" alt=" " class="img-responsive" /></a>
		</div>
		<div class="w3l_search">
			<form action="{{url('/search')}}" method="get">
				<input type="text" name="keyword"  placeholder="Cari produk..">
				<input type="submit" value=" ">
			</form>
		</div>
		<div class="product_list_header">  
			
               
                
                    
              
           
           
		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart " aria-hidden="true"></i><span class="caret"></span> {{Cart::count()}}</a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								 
								
								<li><a href=""></a></li>
								
								 
								<li><a href="{{url('/cart')}}">View Cart</a></li> 
								
								
                     
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					@if (Auth::guest())
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><span class="caret"></span></a>
					 @else
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img style="height: 27px;width: 27px" src="{{ URL::asset('image/'. Auth::user()->gambar) }}" alt=" " class="img-responsive" /><span class="caret"></span></a>
					@endif
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								 @if (Auth::guest())
								
								<li><a href="{{url('/login')}}">Login</a></li>
								 @else
								 
								<li><a href="{{url('/profil')}}">{{ Auth::user()->name }}</a></li> 
								<li>
									<a href="{{url('/logout')}}"
									onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
								</a>
								<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
							</li> 
								
                        @endif
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="">Hubungi Kami</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>

 @include('front.menu')


<!-- //header -->

@yield('content')

<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="col-md-3 w3_footer_grid">
				<h3>Informasi</h3>
				<ul class="w3_footer_grid_list">
					
					<li><a href="about.html">Tentang Kami</a></li>
				
					
				</ul>
			</div>
			<div class="col-md-3 w3_footer_grid">
				<h3>policy info</h3>
				<ul class="w3_footer_grid_list">
					<li><a href="faqs.html">FAQ</a></li>
					<li><a href="privacy.html">privacy policy</a></li>
					<li><a href="privacy.html">terms of use</a></li>
				</ul>
			</div>
			
		<div class="agile_footer_grids">
				<div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
					<div class="w3_footer_grid_bottom">
						<h4>100% secure payments</h4>
						<img src="{{ URL::asset('web/images/logo-ipaymu-glow.png') }}" alt=" " class="img-responsive" />
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
			
			<div class="wthree_footer_copy">
				<p>© 2018 Frozen Food. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- flexSlider -->
				<link rel="stylesheet" href="{{ URL::asset('web/css/flexslider.css') }}" type="text/css" media="screen" property="" />
				<script defer src="{{ URL::asset('web/js/jquery.flexslider.js') }}"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('web/js/bootstrap.min.js') }}"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
<script src="{{ URL::asset('web/js/minicart.js') }}"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
</body>
</html>

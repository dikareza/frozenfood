@extends('layouts.front')
   
@section('content')
 <!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{url('/home')}}">Home</a><span>|</span></li>
				<li> </li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						  @foreach($kategoris as $kategori)
						<li><a href="{{url('kategoriproduk')}}/<?php echo $kategori->id ;?>">{{$kategori->nama_kat}}</a></li>
						@endforeach
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>		
		<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3>upto <i>50%</i> off.</h3>
								<div class="more">
									<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_veg">
				<h3 class="w3l_fruit">Frozen Food</h3>
<div class="w3ls_w3l_banner_nav_right_grid1 w3ls_w3l_banner_nav_right_grid1_veg">
	  @foreach($barangs as $barang)
<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
	
						<div class="hover14 column">
							
                    
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<!-- <div class="tag"><img src="{{ URL::asset('web/images/tag.png') }}" alt=" " class="img-responsive"></div> -->
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											
											<a href="{{url('/detailproduk')}}/<?php echo $barang->id;?>"><img style="height: 140px;width: 140px" src="{{ asset('image/'.$barang->gambar) }}" alt=" " class="img-responsive" /></a>
											<p>{{str_limit($barang->nama,40)}}</p>
											<h4>Rp. {{number_format($barang->harga,0, ',', '.')}} </h4>
										</div>

										<div class="snipcart-details">
											<h1>
											<a href="{{url('/cart/addItem')}}/<?php echo $barang->id; ?>" class="label label-primary" >Add to cart</a></h1>
										</div>


									</div>
								</figure>
							</div>
						</div>
						
						</div>
						
					</div>
					 @endforeach
					<!-- end list -->
					<div class="clearfix"> </div>
				</div>
</div>
</div>
		<div class="clearfix"></div>
	</div>
 @endsection
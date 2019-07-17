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
		
<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_veg">
				
<div class="agileinfo_single">
				<h5>{{$barangs->nama}}</h5>
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="{{ asset('image/'.$barangs->gambar) }}" alt=" " class="img-responsive" />
				</div>
				<div class="col-md-8 agileinfo_single_right">
				
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p align="justify">{{strip_tags($barangs->deskripsi)}}</p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4>Rp. {{number_format($barangs->harga,0, ',', '.')}} </h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
						<h1>	<a href="{{url('/cart/addItem')}}/<?php echo $barangs->id; ?>" class="label label-primary" >Add to cart</a></h1>
						</div>

					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
					<!-- end list -->
					<div class="clearfix"> </div>
				</div>
</div>
</div>
		<div class="clearfix"></div>
	</div>
	<!-- //js -->
 <script src="{{ URL::asset('web/js/okzoom.js') }}"></script>
  <script>
    $(function(){
      $('#example').okzoom({
        width: 150,
        height: 150,
        border: "1px solid black",
        shadow: "0 0 5px #000"
      });
    });
  </script>

 @endsection
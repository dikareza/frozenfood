@extends('layouts.front')
   
@section('content')
 <!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
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
						 
						<li><a href="{{url('/profil')}}">Profil</a></li>
						<li><a href="{{url('/pembelian')}}">Pembelian</a></li>
						
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>		
		<div class="w3l_banner_nav_right">
			
<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_veg">

				<h3 class="w3l_fruit">Biodata Diri</h3>
<div class="w3ls_service_grids1">
	@foreach($users as $user)
				<div class="col-md-4 w3ls_service_grids1_left">
					<img style="height: 300px;width: 300px" src="{{ URL::asset('image/'.$user->gambar) }}" alt=" " class="img-responsive" />
				</div>
				<div class="col-md-8 agileinfo_mail_grid_right">
					
					
						<div class="col-md-6">
							
						<ul class="list-unstyled">
						<li><h1>{{$user->name}}</h1> </li>
						<hr height="50%">
						<li><i class="fa fa-envelope-o" aria-hidden="true"></i> {{$user->email}}</li>
						<hr height="50%">
						<li><i class="fa fa-phone" aria-hidden="true"></i> {{$user->no_hp}}</li>
						<hr height="50%">
						<li><i class="fa fa-calendar" aria-hidden="true"></i> {{$user->tgl_lahir}}</li>

						<hr height="50%">
						
                        
                        @if ( !empty ( $getcity['city_name'] ) )
						<li><i class="fa fa-home" aria-hidden="true"></i> {{$user->alamat}}, {{$getcity['city_name']}}, {{$getprov['province']}}, {{$user->kode_pos}}</li>
						@else
							<li><i class="fa fa-home" aria-hidden="true"></i> {{$user->alamat}}, Kota, Provinsi, {{$user->kode_pos}}</li>
					   @endif
					
					    	<br>
				</ul>	
						</div>
						
						<div class="clearfix"> </div>
						<!-- <label><h4>Alamat</h4></label> -->
					
						<!-- <input type="submit" value="Ubah Profil"> -->
						<input name="_method" type="hidden" value="DELETE">
                                      <input name="_token" type="hidden" value="{{ csrf_token() }}">
						<h1><a href="{{route('profil.edit', $user->id)}}" class="label label-primary"><i class="fa fa-gear" aria-hidden="true"></i> Ubah</a></h1>
						
						
					
					@endforeach
				</div>

				<div class="clearfix"> </div>
			</div>

</div>
</div>
		<div class="clearfix"></div>
	</div>
 @endsection
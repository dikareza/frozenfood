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

				<div class="col-md-4 w3ls_service_grids1_left">

					<img style="height: 300px;width: 300px" src="{{ URL::asset('image/'.$users->gambar) }}" alt=" " class="img-responsive" />

				</div>

				<div class="col-md-8 agileinfo_mail_grid_right">

				

					<form action="{{route('profil.update', $users->id)}})}}" method="post" enctype="multipart/form-data">

						<input name="_method" type="hidden" value="PATCH">

          {{csrf_field()}}

						<div class="col-md-6 wthree_contact_left_grid">

							<label><h4>Nama</h4></label>

							<input type="text" name="name" value="{{$users->name}}" >



							<label><h4>Email</h4></label>

							<input type="email" name="email" value="{{$users->email}}" >

							<label><h4>Kota</h4></label>

							<Select class="form-control" name="city_id">

                           @foreach($kota as $row)

                           <?php $selected = '';

                           if($row['city_id'] == $users->city_id)   

                              {

                                  $selected = 'selected="selected"';

                              }

                              ?>

                          <option value="{{ $row['city_id'] }}" {{$selected}}>{{($row['city_name']) }}</option>

                            @endforeach

                            </select>  

                            <label><h4>Provinsi</h4></label>



							<Select class="form-control" name="province_id">

                           @foreach($prov as $row)

                            <?php $selected = '';

                           if($row['province_id'] == $users->province_id)   

                              {

                                  $selected = 'selected="selected"';

                              }

                              ?>

                          <option value="{{ $row['province_id'] }}" {{$selected}}>{{$row['province'] }}</option>

                            @endforeach

                            </select>  



						</div>

						<div class="col-md-6 wthree_contact_left_grid">

							<label><h4>No HP</h4></label>



							<input type="text" name="no_hp"  value="{{$users->no_hp}}" >

							<label><h4>Kode Pos</h4></label>



							<input type="text" name="kode_pos"  value="{{$users->kode_pos}}" >



							<label><h4>Tanggal Lahir</h4></label><br>

							<input type="date" name="tgl_lahir"  value="{{$users->tgl_lahir}}" >

							<br>

							

							<label><h4>Foto Profil</h4></label>



							<input type="file"  name="gambar" class="form-control">

							

						</div>

						<div class="clearfix"> </div>

						<!-- <label><h4>Alamat</h4></label> -->

						<textarea  name="alamat" >{{$users->alamat}}</textarea>

						<input type="submit" value="Ubah Profil">

						

					</form>

					

				</div>



				<div class="clearfix"> </div>

			</div>



</div>

</div>

		<div class="clearfix"></div>

	</div>

 @endsection
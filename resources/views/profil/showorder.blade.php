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

				<h3 class="w3l_fruit">Detail Pembelian</h3>
<div class="w3ls_service_grids1">
				
				<div class="col-md-8 agileinfo_mail_grid_right">
				
					<form action="#" method="post">
						<input name="_method" type="hidden" value="PATCH">
          {{csrf_field()}}
						<div class="col-md-10 agileinfo_mail_grid_right">
						<table cellpadding="3" cellspacing="0" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="width: 45%;" valign="top"><b><span class="black">Nomor Transaksi iPaymu</span></b></td>
                                         <td style="width: 5%; font-weight: bold;">:</td>
                                        <td width="100%">{{$orders->trx_id}}</td>
                                    </tr>
                                            <tr >
													<td><b><span class="black">Nomor Invoice</span></b></td>
													<td style="font-weight: bold;">:</td>
													<td> {{$orders->invoice_number}}</td>
												</tr>

												<tr >
													<td><b><span class="black">Status Transaksi</span></b></td>
													<td style="font-weight: bold;">:</td>
													 @if( $orders->status == 'berhasil')
                                           
                                        <td  width="55%"><span class="label label-success">{{$orders->status}}</span></td>
                                    @else
                                        <td width="55%" ><span class="label label-danger">{{$orders->status}}</span></td> 
                                    @endif
													
												</tr>

												<tr >
													<td><b><span class="black">Total Belanja</span></b></td>
													<td style="font-weight: bold;">:</td>
													<td width="55%">Rp. {{number_format($orders->total,2)}}</td>
												</tr>
												<tr >
													<td><b><span class="black">Nomor Resi</span></b></td>
													<td style="font-weight: bold;">:</td>
													<td width="55%"> {{$orders->no_resi}}</td>
												</tr>
												

												                   

                                        </tbody></table>

						</div>
						<div class="col-md-6 wthree_contact_left_grid">
						
						

							
						</div>
						<div class="clearfix"> </div>
						<!-- <label><h4>Alamat</h4></label> -->
					<br>
						 @if ($orders->status === 'berhasil')
						    <a href="javascript: w=window.open('https://frozen-food.000webhostapp.com/invoice/<?php echo $orders->id;?>'); w.print();" class="edit-modal btn btn-primary">
                                        <span class="glyphicon glyphicon-edit"></span> Cetak Invoice</a>
                                       @endif
						<br>
						<br>
						<br>
						<label><h4>Daftar Barang</h4></label>
						<table id="" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                     <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Nama Barang</th>
                        <th style="text-align: center;">Total</th>
                        <th style="text-align: center;">Jumlah</th>
                         <th style="text-align: center;">Berat(gr)</th>
                        <th style="text-align: center;">Gambar</th>
                      </tr>
                     
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      @foreach($barangs as $barang)
                                <tr >
                                    <td style="text-align: center;">{{$no++}}</td>
                                    <td style="text-align: center;">{{$barang->nama}}</td>
                                    <td style="text-align: center;">{{$barang->total_brg}}</td>
                                    <td style="text-align: center;">{{$barang->qty}}</td>
                                    <td style="text-align: center;">{{$barang->berat}}</td>
                                      <td style="text-align: center;"><img src="{{ asset('image/'.$barang->gambar)  }}" alt=""
                                   width="50px" height="50px"/></td>
                                   
                                </tr>
                             @endforeach
                    </tbody>
                  </table>
					</form>
					
				</div>

				<div class="clearfix"> </div>
			</div>

</div>
</div>
		<div class="clearfix"></div>
	</div>
 @endsection
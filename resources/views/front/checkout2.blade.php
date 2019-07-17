@extends('layouts.front')
   
@section('content')


</script>
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
     
						@php ($totalcart = [$ongkos,Cart::total()])
								
								<?php 
								ob_start();
								echo array_sum($totalcart);
								$totalcheckout = ob_get_contents();
								ob_end_clean();
								?>
							 <?php
					  
					  $city2 = $getcity2['city_name'];
					  $prov2 = $getprov2['province'];
				
					  ?>
                                
								<?php 
				        $id = str_pad(rand(0,"9".round(microtime(true))),11, "0", STR_PAD_LEFT); 
                        $inv_no = 'INV-'.$id;
                        
                     
						?> 
									
						
    <form action="{{url('/payment')}}/<?php echo  $totalcheckout;?>/<?php echo $inv_no;?>/<?php echo $nama;?>/<?php echo $layanan;?>/<?php echo $ongkos;?>/<?php echo $alamat2;?>/<?php echo $city2;?>/<?php echo $prov2;?>/<?php echo $kode_pos2;?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                	
						 	  
								
								

						
    <section id="cart_items">
		  <div class="container">
	
<!-- about -->
	&nbsp
	&nbsp
			<h3 align="center">3. Pembayaran</span></h3>

		
                         
	      <div class="checkout-right">
					
					<div class="col-md-10 wthree_contact_left_grid">
							<h4> Metode Pembayaran</h4>
					<hr>
							<table style="width:100%">
							  <tr>
							    <th style="padding: 15px"><input type="radio" name="gender" checked="checked" value="ipaymu"> <img src="https://ipaymu.com/wp-content/themes/ipaymu-themes/assets/img/logo-ipaymu-glow.png"><br></th>
							    <th >Cara bertransaksi menggunakan iPaymu dapat dilihat di<a href="https://ipaymu.com/infografik-cara-belanja"> sini</a></th> 
							   
							    
							  </tr>
						
							   
							</table>
							<hr>
							
							

						</div>
						

				<table class="timetable_sub">
					<thead>
						<tr>
							<th>No.</th>	
							<th>Gambar</th>
							<th>Jumlah</th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Berat</th>
							<th>Total</th>
						
						</tr>
					</thead>
					   <tfoot>
                        <tr>
                            <th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>Total</th>
							
							@php $totalberat = 0;
                             @endphp
                            @foreach($cartItems as $key => $value) 
                               @php $totalberat += $value->options->berat * $value->qty; 
                               @endphp
                               
                           
                            @endforeach
                           
							<th>{{$totalberat}} gram</th>
							<th>Rp. {{ number_format(Cart::subtotal(),2)}}</th>
						
                        </tr>
                      </tfoot>
                     <?php $no=1; ?>
                     <?php $count =1;?>
                    @foreach($cartItems as $cartItem)
					<tbody>
						
					<tr class="rem1">
						<td class="invert">{{$no++}}</td>
						<td class="invert-image"><a href="{{url('/detail')}}/{{$cartItem->id}}"><img  style="height: 50px;width: 50px" src="{{'../../image/'.$cartItem->options->img}}" alt=""></a></td>
						<td class="invert">
							 <div class="cart_quantity_button">

                                  

                                    <input disabled type="number" size="2" value="{{$cartItem->qty}}" name="qty""
                                           autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="{{$cartItem->options->stock}}">


                                </div>
						</td>
						<td class="invert"><a href="{{url('/detail')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a>
                                 <p>Stok tersisa: {{$cartItem->options->stock}}</p>
						</td>
						
						<td class="invert">Rp. {{number_format($cartItem->price,2)}}</td>
						<td class="invert">{{$cartItem->options->berat}} gram</td>
						<td class="invert">Rp. {{number_format($cartItem->subtotal,2)}}</td>
						
					</tr>
					<?php $count++;?>
				</tbody> @endforeach

			</table>
			</div>
			<!-- cart -->
		
		<!-- update -->
	</div>
	</section>
			  <!--/#cart_items-->
			

 <section id="do_action">
 	 <div class="container">
<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<h4>Detail Pembayaran</h4>
					<ul>
						 
						
						 	    <li>Kurir <span> {{$nama}} Layanan: {{$layanan}}</span> </li>
						 	    
						 	    <li>Estimasi Pengiriman<span>{{$etd}} </span></li>
						 	    <li>Ongkir <span>Rp. {{number_format((float)$ongkos,2)}}</span></li>

								<li>Sub Total <span>Rp. {{ number_format(Cart::subtotal(),2)}}</span></li>
								
								@php ($totalcart = [$ongkos,Cart::total()])
								
								<?php 
								ob_start();
								echo array_sum($totalcart);
								$totalcheckout = ob_get_contents();
								ob_end_clean();
								?>
								
								<li>Total Belanja <i>-</i> <span>Rp. {{ number_format(array_sum($totalcart),2) }}</span></li>
								
								 
								
							
								
								

						
						
					</ul>
				</div>
				<div class="col-md-8 address_form_agile">
					  
					
					  <h4>Alamat Tujuan 2</h4>
					  
					 <table cellpadding="3" cellspacing="0" style="width: 100%;">
                                            <tbody><tr>
                                                <td style="width: 25%;" valign="top"><b><span class="black">Alamat</span></b></td>
                                                <td style="width: 5%; font-weight: bold;">:</td>
                                                <td width="70%">{{$alamat2}}</td>
                                            </tr>
                                            <tr >
													<td><b><span class="black">Propinsi</span></b></td>
													<td style="font-weight: bold;">:</td>
													<td>{{$prov2}}</td>
												</tr>

												<tr >
													<td><b><span class="black">Kota</span></b></td>
													<td style="font-weight: bold;">:</td>
													<td width="55%">{{$city2}}</td>
												</tr>

												<tr >
													<td><b><span class="black">Kode Pos</span></b></td>
													<td style="font-weight: bold;">:</td>
													<td width="55%"> {{$kode_pos2}}</td>
												</tr>


                                        </tbody></table>
				
									
					</div>
				<div class="col-md-8 address_form_agile">
					  
									<div class="checkout-right-basket">
				        	  <input type="submit" name="" value="Lanjut" class="btn glyphicon glyphicon-chevron-right" aria-hidden="true">
			      	</div>
					</div>
			
				<div class="clearfix"> </div>
				<h3>Catatan</h3>
				Pastikan bahwa semua data yang tampil di atas sudah benar. Setelah Anda mengklik tombol "LANJUT" di samping, Anda tidak akan bisa lagi mengubah data pesanan Anda.
			</div>
			<!-- end check out -->
		</div>
		</section>
	 
  
	 </form>

<!-- //about -->



<!-- end banner -->
		
	

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
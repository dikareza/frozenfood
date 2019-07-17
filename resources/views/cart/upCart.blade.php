
<script>
$(document).ready(function(){
<?php for($i=1;$i<20;$i++){?>
  $('#upCart<?php echo $i;?>').on('change keyup', function(){

  var newqty = $('#upCart<?php echo $i;?>').val();
  var rowId = $('#rowId<?php echo $i;?>').val();
  var proId = $('#proId<?php echo $i;?>').val();

   if(newqty <=0){ alert('enter only valid qty') }
  else {

    $.ajax({
        type: 'get',
        dataType: 'html',
        url: '<?php echo url('/cart/update');?>/'+proId,
        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
        success: function (response) {
            console.log(response);
            $('#updateDiv').html(response);
        }
    });
  }

  });
  <?php } ?>


});



</script>

@if(session('status'))
        <div class="alert alert-success">

            {{session('status')}}
        </div>
        @endif

          @if(session('error'))
        <div class="alert alert-danger">

            {{session('error')}}
        </div>
        @endif
        </script>
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
 <section id="cart_items">
		  <div class="container">
	
<!-- about -->
	&nbsp
	&nbsp
			<h3 align="center">1. Perincian Belanja</span></h3>
         <div class="checkout-right">
					<h4>Jumlah Barang Di Cart: <span>{{Cart::count()}}</span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
						    <th>No.</th>
							<th>Gambar</th>
							<th>Jumlah</th>
							<th>Nama Barang</th>
							<th>Harga</th>
							<th>Berat(gr)</th>
							<th>Total</th>
							<th>Hapus</th>
						</tr>
					</thead>
					 	<tfoot>
                        <tr>
                            <th></th>
							<th></th>
							<th></th>
							<th></th>
							<th>Total</th>
							
							<?php $totalberat = 0;?>
                            
                            @foreach($cartItems as $key => $value) 
                               <?php $totalberat += $value->options->berat * $value->qty; ?>
                              
                               
                           
                            @endforeach
                           
							<th>{{$totalberat}} gram</th>
							<th>Rp. {{Cart::subtotal()}}</th>
							<th></th>
                        </tr>
                      </tfoot>
					   
                     <?php $no=1; ?>
                     <?php $count =1;?>
                    @foreach($cartItems as $cartItem)
					<tbody>
						
					<tr class="rem1">
						<td class="invert">{{$no++}}</td>
						<td class="invert-image"><a href="{{url('/detailproduk')}}/{{$cartItem->id}}"><img src="{{'image/'.$cartItem->options->img}}" style="height: 50px;width: 50px" alt=""></a></td>
						<td class="invert">
							 <div class="cart_quantity_button">

                                  <input type="hidden" id="rowId<?php echo $count;?>" value="{{$cartItem->rowId}}"/>
                                    <input type="hidden" id="proId<?php echo $count;?>" value="{{$cartItem->id}}"/>

                                    <input type="number" size="2" value="{{$cartItem->qty}}" name="qty" id="upCart<?php echo $count;?>"
                                           autocomplete="off" style="text-align:center; max-width:50px; "  MIN="1" MAX="{{$cartItem->options->stock}}">


                                </div>
						</td>
						<td class="invert"><a href="{{url('/detailproduk')}}/{{$cartItem->id}}" style="color:blue">{{$cartItem->name}}</a>
                                 <p>Stok tersisa: {{$cartItem->options->stock}}</p>
						</td>
						
						<td class="invert">Rp. {{$cartItem->price}}</td>
						@php 
						$sumberat = $cartItem->options->berat * $cartItem->qty
						@endphp
						<td class="invert">{{$sumberat}} gram</td>
						<td class="invert">Rp. {{$cartItem->subtotal}}</td>
						<td class="invert">
							<div class="rem">
								<a href="{{url('/cart/remove')}}/{{$cartItem->rowId}}" class="close1"> </a>
							</div>

						</td>
					</tr>
					<?php $count++;?>
				</tbody> @endforeach

			</table>
			</div>
			</div>
	</section>
			  <!--/#cart_items-->
			

 <section id="do_action">
 	 <div class="container">
<div class="checkout-left">	
				<!--<div class="col-md-4 checkout-left-basket">-->
				<!--	<h4>Detail</h4>-->
				<!--	<ul>-->
				<!--		 <li>Sub Total <span>Rp. {{Cart::subtotal()}}</span></li>-->

				<!--		<li>Total <i>-</i> <span>Rp. {{Cart::total()}}</span></li>-->
				<!--	</ul>-->
				<!--</div>-->
				
				<div class="col-md-8 address_form_agile">
					  
									<div class="checkout-right-basket">
									    <a href="{{url('/home')}}">Lihat Produk Lainnya <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
				        	  <a href="{{url('/pengiriman')}}/{{$totalberat}}">Lanjut ke Pengiriman <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
			      	</div>
					</div>
				
			
				<div class="clearfix"> </div>
					<hr>
			</div>
			<!-- end check out -->
		</div>
		</section>
	 
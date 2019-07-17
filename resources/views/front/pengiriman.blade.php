@extends('layouts.front')

   

@section('content')



<script>

var nama;
var layanan;
var ongkos;
var etd;
var rad;
     function getongkir(){
         if(rad == 2){
             var kota = $("#city_id2").val();
         }else{
             var kota = $("#city_id").val();
         }
        //  alert(rad);
         var tipe = $("#kurir").val();
         
         var berat = '<?php echo $totalberat;?>';
         var url = '<?php echo url('/ongkir');?>';
         var resultongkir = $('#resultongkir');
         //alert(tipe);
         if(tipe == 0){
             $("#tbl_ongkir").hide();
         }else{
            $.ajax({
                type: 'GET',
                url: url,
                dataType: "JSON",
                data: {tip:tipe, kot:kota, ber:berat},
                success: function(data) {
                    //alert(data);
                    
                  //alert(data[0].name + data[0].costs[1].description + data[0].costs[1].cost[0].value + data[0].costs[1].cost[0].etd);
                //  resultongkir.html('Kurir: '+ data[0].name + '<br/>' + 'Layanan: ' + data[0].costs[1].description + '<br/>' + 'Ongkir: ' + 'Rp. ' + data[0].costs[1].cost[0].value + '<br/>' + 'Estimasi: ' + data[0].costs[1].cost[0].etd + ' Hari');
                // var my_array = data;
                // var json = JSON.stringify( my_array );
                // resultongkir.html('json: '+ json);
            //   for ( var key in data) {
            //       for ( var key2 in data[key]) {
                     
            //       alert(key + data[key].costs[key2].service;
            //           }
                  
            //     }
                for(var i=0; i<data.length; i++){
                       for(var j=0; j<data[i].costs.length; j++ ){
                           for(var k=0; k<data[i].costs[j].cost.length; k++ ){
                           if(data[i].costs[j].service == "REG"){
                              
                               layanan =  data[i].costs[j].service;
                              ongkos = data[i].costs[j].cost[k].value;
                               etd = data[i].costs[j].cost[k].etd;
                                nama = data[0].name;
                                 console.log( data[i].costs[j].cost[k].value +data[i].costs[j].cost[k].etd);
                                }
                              
                           }
                           
                               
                       }
                       
                   }
               
                //  ongkos = data[0].costs[1].cost[0].value;
                // etd= data[0].costs[1].cost[0].etd;
                // layanan = data[0].costs[0].service;
                
                
                $("#tbl_ongkir").show();
                $("#nama_kurir").val(nama);
                $("#layanan").val(layanan);
                $("#ongkir").val(ongkos);
                $("#estimasi").val(etd+" Hari");
                  
                },
                error: function(e) {
                  console.log("jQuery error message = "+e.message);
                }
            });
         }
       
    }

     function getkota(){
         var province = $("#province_id").val();
         // var dropdown = document.getElementById("kode_pos");
         var url = '<?php echo url('/kota');?>';
         var resultkota = $('#resultkota');
          $.ajax({

                type: 'GET',

                url: url,

                dataType: "JSON",

                data: {prov:province},

                success: function(data) {

                for(var i=0; i<data.length; i++){
                   if(data[i].province_id === province) {  
                  // if (i === 3) { break; }
                               nama =  data[i].city_name;
                              id  =  data[i].city_id ;
                             
                               $('#city_id').append($('<option>', {
                        value: id,
                        text: nama

                    }));
}
                     
                   

                  // dropdown[dropdown.length] = new Option(data[i].city_name, data[i].city_id);
                              // ongkos = data[i].costs[j].cost[k].value;

                              //  etd = data[i].costs[j].cost[k].etd;
                // $('#kode_pos').append($('<option>', {
                //         value: id,
                //         text: nama
                //     }));

        //Remove first optin from list1
                              
                                  console.log(nama);
                   }

                //nama = data[0].name;

                // $('#city_id').append($('<option>', {
                //         value: id,
                //         text: nama
                //     }));
                // $.each(data, function (i, item) {
                //     $('#kode_pos').append($('<option>', { 
                //         value: data.id,
                //         text : data.nama 
                //     }));
                // });
                // $("#kode_pos").val(postal_code);
                //$("#kode_pos").val(kodepos);

                },

                error: function(e) {
                  console.log("jQuery error message = "+e.message);

                }

            });

         }

    function getkodepos(){
         var city = $("#city_id").val();
         // var dropdown = document.getElementById("kode_pos");
         var url = '<?php echo url('/kode_pos');?>';
         var resultongkir = $('#resultkodepost');
          $.ajax({

                type: 'GET',

                url: url,

                dataType: "JSON",

                data: {kot:city},

                success: function(data) {

                for(var i=0; i<data.length; i++){
                          
                               nama =  data[i].city_name;
                              postal_code  =  data[i].postal_code;

                                 
                  // dropdown[dropdown.length] = new Option(data[i].city_name, data[i].city_id);
                              // ongkos = data[i].costs[j].cost[k].value;

                              //  etd = data[i].costs[j].cost[k].etd;
                // $('#kode_pos').append($('<option>', {
                //         value: id,
                //         text: nama
                //     }));

        //Remove first optin from list1
                              
                                  // console.log(i.city_id);
                   }

                //nama = data[0].name;

                // $('#kode_pos').append($('<option>', {
                //         value: id,
                //         text: nama
                //     }));
                // $.each(data, function (i, item) {
                //     $('#kode_pos').append($('<option>', { 
                //         value: data.id,
                //         text : data.nama 
                //     }));
                // });
                $("#kode_pos").val(postal_code);
                //$("#kode_pos").val(kodepos);

                },

                error: function(e) {
                  console.log("jQuery error message = "+e.message);

                }

            });

         }


</script>

<script>

$(document).ready(function(){
    $("input[name$='radio']").click(function() {
        var test = $(this).val();
        rad = test;
        $("div.desc").hide();
        $("#divalamat" + test).show();
        
        if(test == 2){
            $('#alamat').attr('readonly', true);
            $('#province_id').attr("style", "pointer-events: none;");
            $('#city_id').attr("style", "pointer-events: none;");
            $('#kode_pos').attr('readonly', true);
            $('#kurir').val(0);
            $("#tbl_ongkir").hide();
            
        }else{
            $('#alamat').attr('readonly', false);
            $('#province_id').attr("style", "pointer-events: true;");
            $('#city_id').attr("style", "pointer-events: true;");
            $('#kode_pos').attr('readonly', false);
            $('#kurir').val(0);
            $("#tbl_ongkir").hide();
            
        }
    });
   

 


});



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

    

  <form action="{{url('/pembayaran2')}}/{{$users->id}}" method="post" enctype="multipart/form-data">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                	

    <section id="cart_items">

		  <div class="container">

	

<!-- about -->

	&nbsp

	&nbsp

			<h3 align="center">2. Pengiriman </span></h3>



		

                         

	      <div class="checkout-right">

					

				<div class="col-md-12 agileinfo_mail_grid_right">

				

					



						<div class="col-md-4 wthree_news_top_serv_btm_grid">

							<h4> Data Pembeli</h4>

					<hr>

							<table style="width:100%">

							  <tr>

							    <th style="padding: 15px">Nama</th>

							    <th><input type="text" name="name" value="{{$users->name}}" readonly></th> 

							    

							  </tr>

							  <tr>

							    <th style="padding: 15px">Email</th>

							    <td><input type="text" name="email" value="{{$users->email}}" readonly></td> 

							   

							  </tr>

							  <tr>

							     <th style="padding: 15px">ALamat</th>

							    <td><textarea  style="width:95%" name="alamat" id="alamat" required>{{$users->alamat}}</textarea></td> 

							 

							  </tr>

							   <tr>

							     <th style="padding: 15px">Provinsi</th>

							   <th><Select class="form-control" name="province_id" id="province_id" onchange="getkota()">
                   
                            <?php $selected = '';

                           

                                  $selected = 'selected="selected"';

                              

                              ?>
                   <option value="0" {{$selected}}>Pilih Provinsi</option>
                           @foreach($prov as $row)


                          <option value="{{ $row['province_id'] }}">{{$row['province'] }}</option>

                            @endforeach

                            </select>  </th> 

                 

                </tr>
 <div id="resultkota"> 
                <tr>

                  <th style="padding: 15px">Kota</th>
                  <td>
                   <Select class="form-control" name="city_id" id="city_id" onchange="getkodepos()" >
                    </td>
                </tr>
</div>
            <div id="resultkodepost"> 
                <tr>

                  <th style="padding: 15px">Kode Pos</th>
                  <td>
                    <input type="text" name="kode_pos" id="kode_pos" >
                    </td>
                </tr>
</div>
							   <tr>

							     <th style="padding: 15px">No Ponsel</th>

							    <td><input type="text" name="no_hp"  value="{{$users->no_hp}}" required></td> 

							   

							  </tr>

							   

							</table>

							<!--<button class="btn btn-space btn-primary" onclick="myFunction()">Try it</button>-->

							<br>



						</div>

						<div class="col-md-4 wthree_news_top_serv_btm_grid">

							

							<h4> Alamat Pengiriman</h4>

							

							<tr>

							   

							    <hr>

							    <th> 

						 	  

						 	        <!--<form action="">-->

                                      <input type="radio" name="radio" value="1" id="radio" checked="checked"> Sama dengan data pembeli<br>

                                      <input type="radio" name="radio" value="2" id="radio"> Alamat berbeda<br>

                                    <!--</form>-->

                            	</th>

                            	<th> 

						 	  

                                <div id="divalamat2" class="desc" style="display: none;">

                                    		<table style="width:100%">

							 

							

							  <tr>

							     <th style="padding: 15px">ALamat</th>

							    <td><textarea  style="width:95%" name="alamat2" id="alamat2" required>{{$users->alamat}}</textarea></td> 

							 

							  </tr>

							   <tr>

							     <th style="padding: 15px">Provinsi</th>

							    <th><Select class="form-control" name="province_id2" required>

                           @foreach($prov as $row)

                            <?php $selected = '';

                           if($row['province_id'] == $users->province_id)   

                              {

                                  $selected = 'selected="selected"';

                              }

                              ?>

                          <option value="{{ $row['province_id'] }}" {{$selected}}>{{$row['province'] }}</option>

                            @endforeach

                            </select>  </th> 

							   

							  </tr>

							  <tr>

							     <th style="padding: 15px">Kota</th>

							    <td><Select class="form-control" name="city_id2" id="city_id2" required>

                           @foreach($kota as $row)

                           <?php $selected = '';

                           if($row['city_id'] == $users->city_id)   

                              {

                                  $selected = 'selected="selected"';

                              }

                              ?>

                          <option value="{{ $row['city_id'] }}" {{$selected}}>{{($row['city_name']) }}</option>

                            @endforeach

                            </select>  </td> 

							   

							  </tr>

							  <tr>

							    <th style="padding: 15px">Kode Pos</th>

							    <!-- <td><input type="text" name="kode_pos2" value="{{$users->kode_pos}}" required></td>  -->
                 


							   

							  </tr>

							  

							   

							</table>

                                </div>

                            	</th>

							    

							  </tr>

							  <hr>

							  

							

							

						</div>
{{ csrf_field() }}
						<div class="col-md-4 wthree_news_top_serv_btm_grid">

							

							<h4> Jasa Pengiriman</h4>

							

							    <hr>

							    <th> 

						 	  

						 	    <Select class="form-control" name="kurir" id="kurir" onchange="getongkir()" >

                                 <option value="0">PILIH PENGIRIMAN</option>

		                          <option value="jne">JNE REG</option>

		                          <option value="tiki">TIKI REG</option>

                            

                            	</select> 

                            	</th> 

                            	<th> 

						 	  

						 	  <!--<input type="text" name="id_kota" placeholder="kota" required>-->

          <!--                  	</th> -->

          <!--                  	<th> -->

						 	  <!-- <input type="text" name="berat" placeholder="berat" required>-->

						 	    

          <!--                  	</th> -->

          <!--                  	<th> -->

						 	  <!--<input type="text" name="kurir" placeholder="kurir" required>-->

						 

						 	    

                            	</th> 

                            	<th> 

						 	 <hr>

						 <div id="resultongkir">

					<!--	 	     <ul>-->

						 

						

					<!--	 	    <li>Kurir <span> Layanan </span></li>-->

					<!--	 	    <li>Estimasi Pengiriman<span> Hari</span></li>-->

					<!--	 	    <li>Ongkir <span>Rp. </span></li>-->



						

						

					<!--</ul>-->

					<table id="tbl_ongkir" style="display: none;">

                            	</th> 

                            	<tr>

							        <th style="padding: 15px">Kurir</th>

        							    <td>

        							        <ul style="list-style-type:none">

        						 	             <input type="text" name="nama_kurir" id="nama_kurir" style="border:none;background-color:transparent;" readonly>

        						 	        </ul>

        							    </td> 

							 

							    </tr>

							    <tr>

							        <th style="padding: 15px">Layanan</th>

        							    <td>

        							        <ul style="list-style-type:none">

        						 	             <input type="text" name="layanan" id="layanan" style="border:none;background-color:transparent;" readonly>

        						 	        </ul>

        							    </td> 

							 

							    </tr>

							    	<tr>

							        <th style="padding: 15px">Estimasi</th>

        							    <td>

        							        <ul style="list-style-type:none">

        						 	             <input type="text" name="estimasi" id="estimasi" style="border:none;background-color:transparent;" readonly>

        						 	        </ul>

        							    </td> 

							 

							    </tr>

							    	<tr>

							        <th style="padding: 15px">Ongkir</th>

        							    <td>

        							        <ul style="list-style-type:none">

        						 	             <input type="text" name="ongkir" id="ongkir" style="border:none;background-color:transparent;" readonly>

        						 	        </ul>

        							    </td> 

							 

							    </tr>

							  

							    </table>

							    </div>

							  </tr>

						 	  <hr>

						 	 

                                

							   

							

							

						</div>

						<div class="clearfix"> </div>

						

						<input type="submit" value="Lanjut">

						<hr>

					</form>

					<!--<button class="btn btn-space btn-primary" onclick="pembayaran()">Lanjut</button>-->

				</div>

			</div>

			<!-- cart -->

		

		<!-- update -->

	</div>

	</section>

			  <!--/#cart_items-->

			



 <section id="do_action">

 	 <div class="container">



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
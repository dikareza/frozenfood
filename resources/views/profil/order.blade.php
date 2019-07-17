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
						<li><a href="{{url('/Pembelian')}}">Pembelian</a></li>
						
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>		
		<div class="w3l_banner_nav_right">
			
<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_veg">

				<h3 class="w3l_fruit">Pembelian</h3>
				<div class="typo">
         <table id="example" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Total</th>
                        <th style="text-align: center;">Invoice Number</th>
                        <th style="text-align: center;">Dibuat pada</th>
                        <th style="text-align: center;">Diperbarui pada</th>
                        <th style="text-align: center;">Opsi</th>
                      </tr>
                     
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      @foreach($orders as $order)
                                <tr >
                                   <td style="text-align: center;">{{$no++}}</td>
                                     @if( $order->status == 'berhasil')
                                           
                                        <td  ><span class="label label-success">{{$order->status}}</span></td>
                                    @else
                                        <td  ><span class="label label-danger">{{$order->status}}</span></td> 
                                    @endif
                                    
                                    <td style="text-align: center;">Rp. {{number_format((float)$order->total,2)}}</td>
                                    <td style="text-align: center;">{{$order->invoice_number}}</td>
                                    <td style="text-align: center;">{{str_replace("/", " ", date( "d/M/Y G:i:s", strtotime($order->created_at)))}}</td>
                                    <td style="text-align: center;">{{str_replace("/", " ", date( "d/M/Y G:i:s", strtotime($order->updated_at)))}}</td>
                                    <td style="text-align: center;">
                                        <form method="POST" action="{{ url('/repay')}}/<?php echo $order->id;?>/<?php echo $order->total;?>/<?php echo $order->invoice_number;?>" accept-charset="UTF-8">
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                {{csrf_field()}}
                                           @if( $order->status == 'pending')
                                           
                                          <input type="submit" class="btn btn-primary"  value="Bayar">
                                          
                                          @endif
                                      </form>
                                      <form method="POST" action="{{ url('/cancel', $order->id)}}" accept-charset="UTF-8">
                                          
                                          
                                      
                                      <a href="{{url('/detail')}}/<?php echo $order->id;?>" class="show-modal btn btn-success" >
                                        <span class="glyphicon glyphicon-eye-open"></span> Show</a>
                                     <input type="hidden" name="_method" value="delete" />
                                      <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                       <input type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');" value="Batal">
                                     
                                      </form>
                                    </td>
                                   
                                </tr>
                            @endforeach
                    </tbody>
                  </table>
                  </div>

</div>
</div>
		<div class="clearfix"></div>
	</div>
	<script src="{{ URL::asset('admin_theme/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin_theme/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin_theme/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin_theme/lib/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin_theme/lib/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin_theme/lib/datatables/js/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin_theme/js/app-tables-datatables.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('admin_theme/lib/jquery.gritter/js/jquery.gritter.js') }}" type="text/javascript"></script>
    <!-- <script src="{{ URL::asset('admin_theme/js/menu-ajax.js') }}" type="text/javascript"></script> -->
    <!-- <script src="{{ URL::asset('admin_theme/js/crud-ajax.js') }}" type="text/javascript"></script> -->
    <script type="text/javascript">
      $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.dataTables();
        $('#example').DataTable();
      });
    </script>

 
    <script type="text/javascript">
      $(document).ready(function() {
    $('#example').DataTable();
} );
      });
    </script>
 @endsection
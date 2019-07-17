@extends('layouts.adminHeader')



@section('content')

<div class="be-content">

    <div class="main-content container-fluid">

	    <div class="row">

	        <div class="col-xs-12 col-md-6 col-lg-3">

                <div class="widget widget-tile">

                  	<div id="spark1" class="chart sparkline"></div>

	                <div class="data-info">

	                    <div class="desc">Jumlah Member</div>

	                    <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span data-toggle="counter" data-end="{{$user}}" class="number">{{$user}}</span>

	                    </div>

	                </div>

                </div>

	        </div>

	        <div class="col-xs-12 col-md-6 col-lg-3">

                <div class="widget widget-tile">

                  	<div id="spark2" class="chart sparkline"></div>

	                <div class="data-info">

	                	<div class="desc">Jumlah Transaksi</div>

	                    <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end="{{$order}}"  class="number">{{$order}}</span>

	                    </div>

	                </div>

                </div>

	        </div>

	        <div class="col-xs-12 col-md-6 col-lg-3">

                <div class="widget widget-tile">

                  	<div id="spark3" class="chart sparkline"></div>

	                <div class="data-info">

	                    <div class="desc">Jumlah Barang</div>

	                    <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end="{{$barang}}" class="number">{{$barang}}</span>

	                    </div>

	                </div>

                </div>

	        </div>

	        

	    </div>

	    

      

      

      

    </div>

</div>







<script src="{{ URL::asset('admin_theme/lib/jquery/jquery.min.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/js/main.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/lib/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>



    <script src="{{ URL::asset('admin_theme/lib/jquery-flot/jquery.flot.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/lib/jquery-flot/jquery.flot.pie.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/lib/jquery-flot/jquery.flot.resize.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/lib/jquery-flot/plugins/jquery.flot.orderBars.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/lib/jquery-flot/plugins/curvedLines.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/lib/jquery.sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/lib/countup/countUp.min.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/lib/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/lib/jqvmap/jquery.vmap.min.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/lib/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/js/app-dashboard.js')}}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/js/menu-ajax.js') }}" type="text/javascript"></script>

    <script type="text/javascript">

      $(document).ready(function(){

        //initialize the javascript

         App.init();

         App.dashboard();

      });

    </script>

@endsection
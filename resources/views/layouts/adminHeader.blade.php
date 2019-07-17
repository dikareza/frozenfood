<!DOCTYPE html>
<base href="">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="sealcrafter">
    <link rel="shortcut icon" href="img/logo-fav.png') }}">
    <title>Frozen Food Admin</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin_theme/lib/perfect-scrollbar/css/perfect-scrollbar.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin_theme/lib/material-design-icons/css/material-design-iconic-font.min.css') }}"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin_theme/lib/datatables/css/dataTables.bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin_theme/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin_theme/lib/jqvmap/jqvmap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin_theme/lib/datetimepicker/css/bootstrap-datetimepicker.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin_theme/lib/bootstrap-slider/css/bootstrap-slider.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin_theme/lib/jquery.gritter/css/jquery.gritter.css') }}"/>
   
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="{{ URL::asset('admin_theme/css/style.css') }}" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin_theme/lib/summernote/summernote.css') }}"/>
  </head>
  <body>
    <div class="be-wrapper be-fixed-sidebar">
	    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
	        <div class="container-fluid">
	          <div class="navbar-header"><a href="index.html" class="navbar-brand"></a></div>
		        <div class="be-right-navbar">
		            <ul class="nav navbar-nav navbar-right be-user-nav">
			            <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="{{ URL::asset('admin_theme/img/avatar.png') }}" alt="Avatar"><span class="user-name"></span></a>
			                <ul role="menu" class="dropdown-menu">
				                <li>
				                    <div class="user-info">
				                      <div class="user-name"></div>
				                      <div class="user-position online">Online</div>
				                    </div>
				                </li>
			                  	<li><a href="#"><span class="icon mdi mdi-face"></span> {{ Auth::user()->name }}</a></li>
			                  	<li><a href="#"><span class="icon mdi mdi-settings"></span> Settings</a></li>
			                  	<li><a href="{{ url('/admin/logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();"><span class="icon mdi mdi-power"></span> Logout</a>
                                       <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                </li>
			                </ul>
			            </li>
		            </ul>
		            <div class="page-title"><span></span></div>
		           
		        </div>
	        </div>
	    </nav>

	    <!-- Menu -->
	    <div class="be-left-sidebar">
	        <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle"></a>
	          <div class="left-sidebar-spacer">
	            <div class="left-sidebar-scroll">
	              <div class="left-sidebar-content">
	                <ul class="sidebar-elements">
	                  <li class="divider">Menu</li>
	                  <li class=""><a  href="{{ url('/admin-home') }}"><i class="icon mdi mdi-home"></i><span>Beranda</span></a>
	                  </li>
	                  <li class="parent"><a href=""><i class="icon mdi mdi-assignment"></i><span>Master</span></a>
	                    <ul class="sub-menu">
	                      <li class="parent "><a href="{{ url('/barang') }}" >Barang</a>
	                      </li>
	                      <li class="parent "><a href="{{ url('/kategori') }}" >Kategori</a>
	                      </li>
	                      <li class="parent "><a href="{{ url('/member') }}" >Member</a>
	                      </li>
	                    </ul>
	                  </li>
	                  
						<li class=""><a  href="{{ url('/order') }}"><i class="icon mdi mdi-assignment"></i><span>Transaksi</span></a>
	                  </li>
	                   <li class="parent"><a href=""><i class="icon mdi mdi-assignment"></i><span>Laporan</span></a>
	                    <ul class="sub-menu">
	                      <li class="parent "><a href="{{ url('/export/barang') }}" >Barang</a>
	                      </li>
	                      <li class="parent "><a href="{{ url('/export/order') }}" >Transaksi</a>
	                      </li>
	                      <li class="parent "><a href="{{ url('/export/user') }}" >Member</a>
	                      </li>
	                    </ul>
	                  </li>

	                
	                </ul>
	              </div>
	            </div>
	          </div>
	        </div>
      	</div>

      	 @yield('content')
</div>
</body>
</html>
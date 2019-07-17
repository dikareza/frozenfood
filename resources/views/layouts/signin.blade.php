<!DOCTYPE html>
<base href="">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/logo-fav.png') }}">
    <title>Frozen Food</title>
    <link href="{{ URL::asset('admin_theme/lib/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('admin_theme/lib/material-design-icons/css/material-design-iconic-font.min.css') }}" rel="stylesheet"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ URL::asset('admin_theme/css/style.css') }}" type="text/css"/>
  </head>
  <body class="be-splash-screen">
      <!-- @yield('content') -->
   <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
              <div class="panel-heading"><img src="admin_theme/img/logo-xx2.png" alt="logo" width="102" height="27" class="logo-img"><span class="splash-description">Frozen Food</span></div>
              <div class="panel-body">
                <form action="Login/user" method="post">
                  <div class="form-group">
                    <input id="username" name="username" type="text" placeholder="Username" autocomplete="off" class="form-control" autofocus="">
                  </div>
                  <div class="form-group">
                    <input id="password" name="password" type="password" placeholder="Password" class="form-control">
                  </div>
                  <div class="form-group">
                    <center></center>
                  </div>
                
                 
                
                  <div class="form-group login-submit">
                    <button id="login" data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Masuk</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="{{ asset('admin_theme/lib/jquery/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_theme/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_theme/js/main.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_theme/lib/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	 App.init();
      });
      
    </script>
  </body>
</html>
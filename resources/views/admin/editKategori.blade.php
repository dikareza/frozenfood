@extends('layouts.adminHeader')

@section('content')
<div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title"></h2>
          <ol class="breadcrumb page-head-nav">
            <li><a href=""></a></li>
            <li><a href=""></a></li>
            <li class="active"></li>
          </ol>
        </div>
<!--Basic Elements-->
 <div class="main-content container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading panel-heading-divider">Edit<span class="panel-subtitle"></span></div>
                <div class="panel-body">
                  <form action="{{route('kategori.update', $kategoris->id)}}" method="post" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                  <input name="_method" type="hidden" value="PATCH">
          {{csrf_field()}}
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Nama</label>
                      <div class="col-sm-6">
                        <input type="text" required="" name="nama" id="nama" value="{{$kategoris->nama_kat}}" class="form-control">
                      </div>
                    </div>
                    
                     <div class="form-group">
                      <label class="col-sm-3"></label>
                       <a href="{{ URL::previous() }}" type="button" class="btn btn-default md-close">Batal</a>
                     
                        <button type="submit" class="btn btn-primary md-close">Simpan</button>
                     </div>
                   
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
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
      });
    </script>
             @endsection
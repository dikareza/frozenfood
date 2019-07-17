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

        <!-- Main -->
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-default panel-border-color panel-border-color-primary">
                <div class="panel-heading">
                <a href="{{route('kategori.create')}}" class="btn btn-space btn-primary" >
                      <i class="icon icon-left mdi mdi-plus"></i>
                      Tambah kategori
                    </a>
                  <div class="tools">
                    <span class="icon toggle-loading mdi mdi-refresh-sync" onclick="reload_table()"></span>
                  </div>
                </div>
                <div class="panel-body">
                  <table id="example" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Opsi</th>
                      </tr>
                     
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      @foreach($kategoris as $kategori)
                                <tr >
                                    <td style="text-align: center;">{{$no++}}</td>
                                    <td style="text-align: center;">{{$kategori->nama_kat}}</td>
                                    <td style="text-align: center;">
                                      <form method="POST" action="{{ route('kategori.destroy', $kategori->id) }}" accept-charset="UTF-8">
                                       

                                        <a href="{{route('kategori.edit', $kategori->id)}}" class="edit-modal btn btn-info">
                                        <span class="glyphicon glyphicon-edit"></span> Edit</a>
                                       <input name="_method" type="hidden" value="DELETE">
                                      <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                       <input type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');" value="Delete">
                                      </form>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                  </table>
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
        $('#example').DataTable();
      });
    </script>
    

    @endsection
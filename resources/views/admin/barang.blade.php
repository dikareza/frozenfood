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
                <a href="{{route('barang.create')}}" class="btn btn-space btn-primary" >
                      <i class="icon icon-left mdi mdi-plus"></i>
                      Tambah Barang
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
                        <th style="text-align: center;">Kategori</th>
                        <th style="text-align: center;">Harga</th>
                        <th style="text-align: center;">Stok</th>
                        <th style="text-align: center;">Berat(gr)</th>
                        <th style="text-align: center;">Gambar</th>
                        <th style="text-align: center;">Opsi</th>
                      </tr>
                       {{ csrf_field() }}
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      @foreach($barangs as $barang)
                                <tr >
                                    <td style="text-align: center;">{{$no++}}</td>
                                    <td style="text-align: center;">{{$barang->nama}}</td>
                                    <td style="text-align: center;">{{$barang->nama_kat}}</td>
                                    <td style="text-align: center;">{{$barang->harga}}</td>
                                    <td style="text-align: center;">{{$barang->stok}}</td>
                                    <td style="text-align: center;">{{$barang->berat}}</td>
                                    <td style="text-align: center;"><img src="{{ asset('image/'.$barang->gambar)  }}" alt=""
                                   width="50px" height="50px"/></td>
                                   <td style="text-align: center;">
                                      <form method="POST" action="{{ route('barang.destroy', $barang->id) }}" accept-charset="UTF-8">
                                        <!--<a href="{{route('barang.show', $barang->id)}}" class="show-modal btn btn-success" >-->
                                        <!--<span class="glyphicon glyphicon-eye-open"></span> Show</a>-->

                                        <a href="{{route('barang.edit', $barang->id)}}" class="edit-modal btn btn-info">
                                        <span class="glyphicon glyphicon-edit"></span> Edit</a>
                                       <input type="hidden" name="_method" value="DELETE">
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
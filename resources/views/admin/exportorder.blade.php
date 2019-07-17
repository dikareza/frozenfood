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
                <a href="{{ URL::to('downloadOrder/xlsx') }}" class="btn btn-space btn-primary" >
                      <i class="icon icon-left mdi mdi-download"></i>
                      Download Excel
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
                        <th style="text-align: center;">No Transaki ipaymu</th>
                        <th style="text-align: center;">Status</th>
                        <th style="text-align: center;">Total</th>
                        <th style="text-align: center;">Member</th>
                        <th style="text-align: center;">No Resi</th>
                        <th style="text-align: center;">Tanggal</th>
                      </tr>
                       {{ csrf_field() }}
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      @foreach($orders as $order)
                                <tr >
                                    <td style="text-align: center;">{{$no++}}</td>
                                    <td style="text-align: center;">{{$order->trx_id}}</td>
                                     @if($order->status === 'berhasil')
                                    <td style="text-align: center;"><span class="label label-success">{{$order->status}}</span></td>
                                    @else
                                    <td style="text-align: center;"><span class="label label-danger">{{$order->status}}</span></td>
                                    @endif
                                    <td style="text-align: center;">{{$order->total}}</td>
                                    <td style="text-align: center;">{{$order->name}}</td>
                                    <td style="text-align: center;">{{$order->no_resi}}</td>
                                    <td style="text-align: center;">{{str_replace("/", " ", date( "d/M/Y G:i:s", strtotime($order->created_at)))}}</td>
                                 
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
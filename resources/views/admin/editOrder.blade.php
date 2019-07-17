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
                  <form action="{{route('order.update', $orders->id)}}" method="post" style="border-radius: 0px;" class="form-horizontal group-border-dashed">
                  <input name="_method" type="hidden" value="PATCH">
          {{csrf_field()}}
                     <div class="form-group">
                      <label class="col-sm-3 control-label">No Transaksi iPaymu</label>
                      <div class="col-sm-6">
                        <label class="col-sm-6 control-label"><b>{{$orders->trx_id}}</b></label>
                      </div>
                    </div>
                     @if($orders->status === 'berhasil')
                                     <div class="form-group">
                      <label class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-6">
                        <label class="col-sm-6 control-label"><b><span class="label label-success">{{$orders->status}}</span></b></label>
                      </div>
                    </div>
                                    @else
                                   <div class="form-group">
                      <label class="col-sm-3 control-label">Status</label>
                      <div class="col-sm-6">
                        <label class="col-sm-6 control-label"><b><span class="label label-danger">{{$orders->status}}</span></b></label>
                      </div>
                    </div>
                                    @endif
                   
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Total</label>
                      <div class="col-sm-6">
                        <label class="col-sm-6 control-label"><b>Rp. {{number_format($orders->total,2)}}</b></label>
                      </div>
                    </div>
                  @foreach($users as $row)
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Member</label>
                      <div class="col-sm-6">
                        <label class="col-sm-6 control-label"><b>{{$row->name}}</b></label>
                    </div>
                   </div>
                   <div class="form-group">
                      <label class="col-sm-3 control-label">Alamat</label>
                      <div class="col-sm-6">
                        <label class="col-sm-6 control-label"><b>{{$row->alamat}}, {{$getcity['city_name']}}, {{$getprov['province']}}, {{$row->kode_pos}}</b></label>
                    </div>
                   </div>
                   @endforeach
                   @if ($orders->status === 'berhasil')
                     <div class="form-group">
                      <label class="col-sm-3 control-label">No Resi</label>
                      <div class="col-sm-6">
                        <input type="text" name="no_resi" value="{{$orders->no_resi}}" class="form-control" required>
                      </div>
                    </div>
                    @else
                     <div class="form-group">
                      <label class="col-sm-3 control-label">No Resi</label>
                      <div class="col-sm-6">
                        <input type="text" disabled name="no_resi" value="{{$orders->no_resi}}" class="form-control">
                      </div>
                    </div>
                    @endif
                   
                   
                     <div class="form-group">
                      <label class="col-sm-3"></label>
                       <a href="{{ URL::previous() }}" type="button" class="btn btn-default md-close">Batal</a>
                      @if($orders->status === 'berhasil')
                        <button type="submit" class="btn btn-primary md-close">Simpan</button>
                          @endif
                     </div>
                    
                   
                  </form>
                  <!-- tabel -->
                  <hr>
                   <div class="form-group">
                      <label class="col-sm-3 control-label"><h2><b>Daftar Barang</b></h2></label>
                     
                    </div>
                  <div class="panel-body">
                  <table id="postTable" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Nama Barang</th>
                        <th style="text-align: center;">Total</th>
                        <th style="text-align: center;">Jumlah</th>
                        <th style="text-align: center;">Gambar</th>
                      </tr>
                     
                    </thead>
                    <tbody>
                     <?php $no=1; ?>
                      @foreach($barangs as $barang)
                                <tr >
                                    <td style="text-align: center;">{{$no++}}</td>
                                    <td style="text-align: center;">{{$barang->nama}}</td>
                                    <td style="text-align: center;">{{$barang->total_brg}}</td>
                                    <td style="text-align: center;">{{$barang->qty}}</td>
                                      <td style="text-align: center;"><img src="{{ asset('image/'.$barang->gambar)  }}" alt=""
                                   width="50px" height="50px"/></td>
                                   
                                </tr>
                             @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- tabel -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  -->
       

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
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

                <div class="panel-heading panel-heading-divider">Add Barang<span class="panel-subtitle"></span></div>

                <div class="panel-body">

                  <form action="{{route('barang.update', $barangs->id) }}" method="post" enctype="multipart/form-data" style="border-radius: 0px;" class="form-horizontal group-border-dashed">

                      <input name="_method" type="hidden" value="PATCH">

          {{csrf_field()}}

                    <div class="form-group">

                      <label class="col-sm-3 control-label">Nama</label>

                      <div class="col-sm-6">

                        <input type="text" required="" name="nama" value="{{$barangs->nama}}" class="form-control">

                      </div>

                    </div>

                    <div class="form-group">

                      <label class="col-sm-3 control-label">Kategori</label>

                      <div class="col-sm-6">

                        <Select class="form-control" name="kat_id">

                         

                           @foreach($joins as $kat)

                            <?php $selected = '';

                           if($kat->id == $barangs->kat_id)   

                              {

                                  $selected = 'selected="selected"';

                              }

                              ?>

                            Category:  <option value="{{ $kat->id }}" {{$selected}}>{{($kat->nama_kat) }}</option>

                            @endforeach

                            </select>

                      </div>

                    </div>

                  

                     <div class="form-group">

                      <label class="col-sm-3 control-label">Harga</label>

                      <div class="col-sm-6">

                        <input type="text" required="" name="harga" value="{{$barangs->harga}}" class="form-control">

                      </div>

                    </div>

                     <div class="form-group">

                      <label class="col-sm-3 control-label">Stok</label>

                      <div class="col-sm-6">

                        <input type="text" required="" name="stok" value="{{$barangs->stok}}" class="form-control">

                      </div>

                    </div>

                    <div class="form-group">

                      <label class="col-sm-3 control-label">Berat</label>

                      <div class="col-sm-6">

                        <input type="text" required="" name="berat" value="{{$barangs->berat}}" class="form-control">

                      </div>

                    </div>

                    <div class="form-group">

                      <label class="col-sm-3 control-label">Deskripsi</label>

                      <div class="col-sm-6">

                        <div class="panel-body">

                       <textarea name="deskripsi" class="summernote">{{$barangs->deskripsi}}</textarea>

                     </div>

                      </div>

                    </div>

                    <div class="form-group">

                      <label class="col-sm-3 control-label">Gambar</label>

                      <div class="col-sm-6">

                        <img src="{{ asset('image/'.$barangs->gambar) }}" id="showgambar" style="max-width:200px;max-height:200px;float:left;" />

                      </div>

                    </div>

                    <div class="form-group">

                      <label class="col-sm-3 control-label">Gambar</label>

                      <div class="col-sm-6">

                        <input type="file"  id="inputgambar" name="gambar" class="form-control">

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

    <script src="{{ URL::asset('admin_theme/lib/summernote/summernote.min.js') }}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/lib/summernote/summernote-ext-beagle.js') }}" type="text/javascript"></script>

    <script src="{{ URL::asset('admin_theme/js/app-form-wysiwyg.js') }}" type="text/javascript"></script>

    <!-- <script src="{{ URL::asset('admin_theme/js/menu-ajax.js') }}" type="text/javascript"></script> -->

    <!-- <script src="{{ URL::asset('admin_theme/js/crud-ajax.js') }}" type="text/javascript"></script> -->

    <script type="text/javascript">

      $(document).ready(function(){

        //initialize the javascript

        App.init();

        App.dataTables();

        $('.summernote').summernote();

      });

    </script>

    <script type="text/javascript">



      function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();



            reader.onload = function (e) {

                $('#showgambar').attr('src', e.target.result);

            }



            reader.readAsDataURL(input.files[0]);

        }

    }



    $("#inputgambar").change(function () {

        readURL(this);

    });



</script>

   

             @endsection
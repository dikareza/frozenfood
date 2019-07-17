 @extends('layouts.pdfhead')
   
@section('content')
 <div class="main-content container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="invoice">
                <div class="row invoice-header">
                  <div class="col-xs-7">
                    <div class=""><img style="height: 150px;width: 300px" src="{{ URL::asset('image/new-logo.png') }}" alt=" " class="img-responsive" /></div>
                  </div>
                   @foreach($orders as $row)
                  <div class="col-xs-5 invoice-order"><span class="invoice-id">Invoice #{{$row->invoice_number}} </span><span class="incoice-date">{{str_replace("/", " ", date( "d/M/Y G:i:s", strtotime($row->created_at)))}} </span></div>
                  
                </div>
                <div class="row invoice-data">
                  <div class="col-xs-5 invoice-person"><span class="name">Penjual</span><span>Frozen Food</span><span></span><span></span><span> </span></div>
                  <div class="col-xs-2 invoice-payment-direction"><i class="icon mdi mdi-chevron-right"></i></div>
                 
                  <div class="col-xs-5 invoice-person"><span class="name">Tujuan Pengiriman</span>{{$row->alamat2}}<span></span><span>{{$row->city_id2}}</span><span>{{$row->province_id2}}</span><span>{{$row->kode_pos2}}</span></div>
                  @endforeach
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <table class="invoice-details">
                      <tr>
                        <th style="width:40%">Nama Barang</th>
                        <th style="width:20%" class="hours">Jumlah</th>
                        <th style="width:20%" class="amount">Berat (gr)</th>
                        <th style="width:20%" class="amount">Sub Total</th>
                      </tr>
                       <?php $no=1; ?>
          <?php $sum_sub_total = 0 ?>
                      @foreach($barangs as $row)
                      <tr>
                        <td class="description">{{$row->nama}}</td>
                        <td class="hours">{{$row->qty}}</td>
                        <td class="hours">{{$row->berat}} gr</td>
                        <td class="amount">Rp. {{number_format($row->total_brg, 2)}}</td>
                      </tr>
                       <?php $sum_sub_total += $row->total_brg ?>
                             @endforeach
                              <tr>
                        <td></td>
                        <td></td>
                        <td class="summary">Berat Total(gr)</td>
                        <?php $totalberat = 0;?>
                        @foreach($barangs as $key => $value)
                        
                             
                          
                              
                              <?php $totalberat += $value->berat * $value->qty; ?>
                              @endforeach 
                           
                            
                        <td class="amount">{{$totalberat}} gram</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td class="summary">Subtotal</td>
                        <td class="amount">Rp. {{ number_format($sum_sub_total,2)}}</td>
                      </tr>
                       @foreach($orders as $row)
                      <tr>
                        <td class="description">{{$row->kurir}}</td>
                        <td>Layanan : {{$row->layanan}}</td>
                        <td class="summary">Ongkos Kirim</td>
                        <td class="amount">Rp. {{number_format($row->ongkir,2)}}</td>
                      </tr>
                     
                      <tr>
                        <td></td>
                         <td></td>
                        <td class="summary total">Total</td>
                        <td class="amount total-value">Rp. {{number_format($row->total,2)}}</td>
                      </tr>
                      
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12 invoice-payment-method"><span class="title">Metode Pembayaran</span><span>iPaymu</span><span>Tipe iPaymu:  {{$row->tipe}}</span><span>Nomor transaksi iPaymu: {{$row->trx_id}}</span></div>@endforeach
                </div>
                <div class="row">
                  <div class="col-md-12 invoice-message"><span class="title">Terima Kasih Sudah Belanja Di Tempat Kami</span>
                   
                  </div>
                </div>
                
               
              </div>
            </div>
          </div>
        </div>
        @endsection
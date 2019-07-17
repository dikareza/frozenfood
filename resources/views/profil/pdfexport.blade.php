<!DOCTYPE html>
<!-- saved from url=(0105)https://s3-eu-west-1.amazonaws.com/htmlpdfapi.production/free_html5_invoice_templates/example1/index.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Example 1</title>
  <style></style></head>
  <body>
    <header class="clearfix">
      <div id="logo">
      </div>
                     
      <center><h1>INVOICE</h1></center>
  
      <div id="company" class="clearfix">
         @foreach($orders as $row)
         <div><span><b>Nomor</b></span>  {{$row->id}} </div>
        <div><span><b>Tanggal</b></span> {{$row->created_at}} </div>
      @endforeach
      </div>
      <br>
      <div><b>Alamat Tujuan</b></div>
      <div id="project">
          @foreach($users as $row)
        <div><span>Alamat: </span> {{$row->alamat}}</div>
        <div><span>Kota: </span>  - </div>
        <div><span>Kode Pos: </span>  {{$row->kode_pos}}</div>
         <div><span>provinsi: </span> - </div>
          @endforeach
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">No</th>
            <th class="desc">Nama Barang</th>
            <th>QTY</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; ?>
          <?php $sum_sub_total = 0 ?>
                      @foreach($barangs as $barang)
                                <tr >
                                    <td style="text-align: center;">{{$no++}}</td>
                                    <td style="text-align: center;">{{$barang->nama}}</td>
                                    <td style="text-align: center;">{{$barang->qty}}</td>
                                    <td style="text-align: center;">{{$barang->total_brg}}</td>
                                    
                                   
                                </tr>
                                <?php $sum_sub_total += $barang->total_brg ?>
                             @endforeach
                           <br>
                              <tr>
                                <td colspan="3">SUBTOTAL</td>
                                <td class="total">Rp. {{ $sum_sub_total}}</td>
                                 <tr>
                                <td colspan="3" class="grand total">Ongkos Kirim</td>
                                <td class="grand total">Rp.  21.000</td>
                              </tr>
                              </tr>
                              @foreach($orders as $row)
                              <tr>
                                <td colspan="3" class="grand total">Total Pembayaran</td>
                                <td class="grand total"><b> Rp. {{$row->total}}</b></td>
                              </tr>
                               @endforeach
        </tbody>
      </table>
      <div id="notices">
       
        <div class="notice"></div>
      </div>
    </main>
    <footer>
     
    </footer>
  
</body></html>
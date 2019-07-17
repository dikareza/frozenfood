<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Order;
use RajaOngkir;
use App\Notify;
use App\User;
use App\Barang;
use App\Notifikasi;
use App\Ureturn;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class CheckoutController extends Controller
{
    //
    public function index($totalberat) {
       
        if (Auth::check()) {
            $getid = auth()->user()->id;
            $users = user::findorfail($getid);
            $kota = RajaOngkir::Kota()->all();
            $prov = RajaOngkir::Provinsi()->all();
            $city_id = DB::table('users')->select('city_id')->where('id', '=', $getid)->get();
                foreach($city_id as $row) { 
                     $id_kota = $row->city_id; 
                }
            $get_post = RajaOngkir::Kota()->find($id_kota);

              $cartItems = Cart::content(); 
              $ongkir = RajaOngkir::Cost([
                'origin'        => 179, // id kota asal
                'destination'   => 177, // id kota tujuan
                'weight'        => 500, // berat satuan gram
                'courier'       => 'jne', // kode kurir pengantar ( jne / tiki / pos )
            ])->get();
             
            return view('front.pengiriman', compact('users','cartItems','ongkir','kota','prov','totalberat', 'get_post'));
        } else {
            return redirect('login');
        }
    }

    public function update(Request $request, $id, $totalberat)
    
    {
        
        $users = user::findorfail($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->city_id = $request->city_id;
        $users->province_id = $request->province_id;
        $users->no_hp = $request->no_hp;
        $users->kode_pos = $request->kode_pos;
        $users->alamat = $request->alamat;
        $kurir = $request->kurir;
        $users->save();
         return redirect()->route('checkout.bayar', ['kurir' => $kurir, 'totalberat' => $totalberat]);
     }
     function fetch(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = RajaOngkir::Kota()->byProvinsi($value)->get();
     // $data = DB::table('country_state_city')
     //   ->where($select, $value)
     //   ->groupBy($dependent)
     //   ->get();

     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->dependent.'">'.$row->dependent.'</option>';
     }
      // dd($output);
     echo $output;
    }

     public function get_kota(Request $request) {
       
      
           
      
         //$id_kota = $request->id_kota;
         //
         
         $id_prov= $request->prov;
      
// dd($id_kot);
          
            // $result  =RajaOngkir::Cost([
            //     'origin'        => 179, // id kota asal
            //     'destination'   => 177, // id kota tujuan
            //     'weight'        => 500, // berat satuan gram
            //     'courier'       => 'jne', // kode kurir pengantar ( jne / tiki / pos )
            // ])->get();
              // $result =  RajaOngkir::Kota()->byProvinsi($id_kot)->get();
         $result = RajaOngkir::Kota()->byProvinsi($id_prov)->get();
         // $ar = array($result);
          echo json_encode($result);
           // echo json_encode($result);
            // $json =  json_encode($ongkir);
            // $decode = json_decode($json , true);
           // dd($result);
            
         

            // return view('front.upkirim', compact('decode'));
       
        
    }
     public function kode_pos(Request $request) {
       
      
           
      
         //$id_kota = $request->id_kota;
         //
         
         $id_kot= $request->kot;
      
// dd($id_kot);
          
            // $result  =RajaOngkir::Cost([
            //     'origin'        => 179, // id kota asal
            //     'destination'   => 177, // id kota tujuan
            //     'weight'        => 500, // berat satuan gram
            //     'courier'       => 'jne', // kode kurir pengantar ( jne / tiki / pos )
            // ])->get();
              // $result =  RajaOngkir::Kota()->byProvinsi($id_kot)->get();
         $result = RajaOngkir::Kota()->find($id_kot);
         $ar = array($result);
          echo json_encode($ar);
           // echo json_encode($result);
            // $json =  json_encode($ongkir);
            // $decode = json_decode($json , true);
           // dd($result);
            
         

            // return view('front.upkirim', compact('decode'));
       
        
    }
     public function ongkir(Request $request) {
       
      
           
        $city_id = DB::table('users')->select('city_id')->where('id', '=', 533)->get();
        foreach($city_id as $row) { 
                 $id_kota = $row->city_id; 
        }
          
         //$id_kota = $request->id_kota;
         //
         
         $kurir = $request->tip;
         $kota =  $request->kot;
         $berat = $request->ber;

          
              $ongkir = RajaOngkir::Cost([
                'origin'        => 179, // id kota asal
                'destination'   => 175, // id kota tujuan
                'weight'        => $berat, // berat satuan gram
                'courier'       => $kurir, // kode kurir pengantar ( jne / tiki / pos )
            ])->get();
            echo json_encode($ongkir);
            // $json =  json_encode($ongkir);
            // $decode = json_decode($json , true);
        //dd($ongkir);
            
         

            // return view('front.upkirim', compact('decode'));
        
    }
    public function ongkir1() {
       
      
              $ongkir = RajaOngkir::Cost([
                'origin'        => 179, // id kota asal
                'destination'   => 477, // id kota tujuan
                'weight'        => 800, // berat satuan gram
                'courier'       => 'tiki', // kode kurir pengantar ( jne / tiki / pos )
            ])->get();
         dd($ongkir);
        
    }

    public function bayar($kurir, $totalberat) {
       
        if (Auth::check()) {
              $getid = auth()->user()->id;
              $users = user::findorfail($getid);
              $city_id = DB::table('users')->select('city_id')->where('id', '=', $getid)->get();
              $province_id = DB::table('users')->select('province_id')->where('id', '=', $getid)->get();
                foreach($province_id as $row) { 
                        $province_id = $row->province_id; 
                    }    
                foreach($city_id as $row) { 
                     $id_kota = $row->city_id; 
                }
                $kota = RajaOngkir::Kota()->find($id_kota);
                $prov = RajaOngkir::Provinsi()->find($province_id);
                $getcity = json_decode(json_encode($kota),true);
                $getprov = json_decode(json_encode($prov),true);
              $cartItems = Cart::content(); 
              $ongkir = RajaOngkir::Cost([
                'origin'        => 179, // id kota asal :kediri kota
                'destination'   => $id_kota, // id kota tujuan
                'weight'        => $totalberat, // berat satuan gram
                'courier'       => $kurir, // kode kurir pengantar ( jne / tiki / pos )
            ])->get();
            
            return view('front.checkout', compact('cartItems','ongkir','users','getcity','getprov'));
        } else {
            return redirect('login');
        }
    }
    public function bayar2(Request $request, $id) {
       
        if (Auth::check()) {
              
               
                $cartItems = Cart::content(); 
                //jasa kirim
                $nama = $request->nama_kurir;
                $layanan =  $request->layanan;
                //dd($layanan);
                $ongkos =  $request->ongkir;
                $etd =  $request->estimasi;
                
                
                if($request->radio == 2){
                 $alamat2  = $request->alamat2;
                    $province_id2 = $request->province_id2;
                    $city_id2 = $request->city_id2;
                    $kode_pos2  = $request->kode_pos2;
                    
                     $kota2 = RajaOngkir::Kota()->find($city_id2);
                    $prov2 = RajaOngkir::Provinsi()->find($province_id2);
                    $getcity2 = json_decode(json_encode($kota2),true);
                    $getprov2 = json_decode(json_encode($prov2),true);
                    //dd($getcity2,$getprov2);
                    return view('front.checkout2', 
            compact('cartItems','users','getcity2','getprov2','nama','layanan','ongkos','etd','alamat2','province_id2','city_id2','kode_pos2'));    
                    
               
                }else{
                    // input profil
                    $getid = auth()->user()->id;
              $users = user::findorfail($getid);
              $city_id = DB::table('users')->select('city_id')->where('id', '=', $getid)->get();
              $province_id = DB::table('users')->select('province_id')->where('id', '=', $getid)->get();
                foreach($province_id as $row) { 
                        $province_id = $row->province_id; 
                    }    
                foreach($city_id as $row) { 
                     $id_kota = $row->city_id; 
                }
                     $users = user::findorfail($id);
                $users->name = $request->name;
                $users->email = $request->email;
                $users->city_id = $request->city_id;
                $users->province_id = $request->province_id;
                $users->no_hp = $request->no_hp;
                $users->kode_pos = $request->kode_pos;
                $users->alamat = $request->alamat;
                $users->save();
                 $kota = RajaOngkir::Kota()->find($id_kota);
                $prov = RajaOngkir::Provinsi()->find($province_id);
                $getcity = json_decode(json_encode($kota),true);
                $getprov = json_decode(json_encode($prov),true);
                return view('front.checkout', 
            compact('cartItems','users','getcity','getprov','nama','layanan','ongkos','etd','alamat2','province_id2','city_id2','kode_pos2'));
                   
                }
                
        } else {
            return redirect('login');
        }
    }
    public function formvalidate($totalcheckout,$name, $qty) {
     
        $userid = Auth::user()->id;
        //input database
        order::createOrder($totalcheckout);
        Cart::destroy();
        return redirect()->action('CheckoutController@payment', ['total' => $totalcheckout,'name' => $name,'qty' => $qty ]
            );

    }
    public function newstok() {
     
        $userid = Auth::user()->id;
        //$barang = DB::table('barangs')->where('id', '=', 6)->decrement('stok', 3);
        $cartItems = Cart::content();
        foreach($cartItems as $key => $row){
          
            DB::table('barangs')
            ->where('id', $row->id)
            ->decrement('stok',$row->qty);
            
        }
       
        //  dd($row);
        // Barang::where('id', [4,5,8])
        // ->decrement('stok', [1,1,1]);

        
       

    }
    public function payment($totalcheckout,$inv_no, $nama, $layanan, $ongkos, $alamat2, $city2, $prov2, $kode_pos2) {
        
       $url = 'https://my.ipaymu.com/payment.htm';  // URL Payment iPaymu           
        $params = array(   // Prepare Parameters            
            'key'      => 'k1vsLATWiOAxUxn0GSEOdc8hRBsC21', // API Key Merchant / Penjual
                    'action'   => 'payment',
                    'product'  => $inv_no,
                    'price'    => $totalcheckout, // Total Harga
                    'quantity' => 1,
                    'comments' => 'Nomor Faktur / kode transaksi', // Optional
                    'ureturn'  =>  'https://frozen-food.000webhostapp.com/terimakasih'.str_replace('&url_no=','?url_no=', '&url_no='.mt_rand(0,999)),
                    'unotify'  => 'https://frozen-food.000webhostapp.com/getnotify'.str_replace('&','?', '&'),
                    'ucancel'  => 'https://frozen-food.000webhostapp.com/cancel',
                    'format'   => 'json' // Format: xml / json. Default: xml
        );
        $params_string = http_build_query($params);
 
        //open connection
        $ch = curl_init();
         
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
         
        //execute post
        $request = curl_exec($ch);
         
        if ( $request === false ) {
            echo 'Curl Error: ' . curl_error($ch);
        } else {
         
            $result = json_decode($request, true);
           
            if( isset($result['url'])){
           $sid = $result['sessionID'];
            $userid = Auth::user()->id;
            order::createOrder($totalcheckout,$inv_no,$sid,$nama, $layanan, $ongkos, $alamat2, $city2, $prov2, $kode_pos2);
            
            $cartItems = Cart::content();
            foreach($cartItems as $key => $row){
              
                DB::table('barangs')
                ->where('id', $row->id)
                ->decrement('stok',$row->qty);
                
            }
            header('location: '. $result['url']);
            }else {
                echo "Request Error ". $result['Status'] .": ". $result['Keterangan'];
            }
        }
         
        //close connection
        curl_close($ch);
        dd($result);
    }
    public function repay($id, $total,$invoice_number) {
        
       $url = 'https://my.ipaymu.com/payment.htm';  // URL Payment iPaymu           
        $params = array(   // Prepare Parameters            
            'key'      => 'k1vsLATWiOAxUxn0GSEOdc8hRBsC21', // API Key Merchant / Penjual
                    'action'   => 'payment',
                    'product'  => $invoice_number,
                    'price'    => $total, // Total Harga
                    'quantity' => 1,
                    'comments' => 'Nomor Faktur / kode transaksi', // Optional
                    'ureturn'  =>  'https://frozen-food.000webhostapp.com/terimakasih-update'.str_replace('&url_no=','?url_no=', '&url_no='.mt_rand(0,999)),
                    'unotify'  => 'https://frozen-food.000webhostapp.com/getnotify'.str_replace('&','?', '&'),
                    'ucancel'  => 'https://frozen-food.000webhostapp.com/cancel',
                    'format'   => 'json' // Format: xml / json. Default: xml
        );
        $params_string = http_build_query($params);
 
        //open connection
        $ch = curl_init();
         
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, count($params));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
         
        //execute post
        $request = curl_exec($ch);
         
        if ( $request === false ) {
            echo 'Curl Error: ' . curl_error($ch);
        } else {
         
            $result = json_decode($request, true);
           
            if( isset($result['url'])){
            $sid = $result['sessionID'];
            $userid = Auth::user()->id;
            Order::where('id', $id)
              ->update(['sid' => $sid]);
            
            Cart::destroy();
            header('location: '. $result['url']);
            }else {
                echo "Request Error ". $result['Status'] .": ". $result['Keterangan'];
            }
        }
         
        //close connection
        curl_close($ch);
        dd($result);
    }
    public function notify(){

        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, "https://my.ipaymu.com");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        curl_close($ch);      

  
        $result =  $output;
        $result = json_decode($result, TRUE);
        $trx_id = $result['trx_id'];
        $sid = $result['sid'];
        $buyer = $result['buyer'];
       
        //Notify::update($id, $userid,$title,$body),;
         Order::where('sid', $id)
              ->update(['sid' => $sid, 'trx_id' => $trx_ide, 'buyer' =>$buyer]);
        
    }
    public function cekstatus(){
    // $ch = curl_init(); 
    //         curl_setopt($ch, CURLOPT_URL, "https://my.ipaymu.com/api/CekTransaksi.php?key=k1vsLATWiOAxUxn0GSEOdc8hRBsC21&id=267584");
    //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    //         $output = curl_exec($ch); 
    //         curl_close($ch);  
            $url="https://my.ipaymu.com/api/CekTransaksi.php?key=k1vsLATWiOAxUxn0GSEOdc8hRBsC21&id=267584";
       $balance = simplexml_load_file($url);
			dd($balance);

    }
    public function ureturn(){
           //get value
            $url_no = Input::get('url_no');
            $trx_id = Input::get('trx_id');
            $status = Input::get('status');
            $tipe = Input::get('tipe');
            $d = Input::get('d');
            //insert value
            $ureturn = new ureturn();
            $ureturn->url_no = $url_no;
            $ureturn->trx_id = $trx_id;
            $ureturn->status = $status;
            $ureturn->tipe = $tipe;
            $ureturn->d = $d;
            $ureturn->save();
            //update status
            $userid = Auth::user()->id;
            $order = DB::table('orders')
                ->where('user_id', '=', $userid)
                ->orderBy('created_at', 'desc')
                ->get();
           
                foreach($order as $key => $row)
            {
           
                   if($key == 0){
                       $order_id = $row->id;
                        }
						
            }
          
            Order::where('id', $order_id)
              ->update(['trx_id' => $trx_id, 'status' => $status, 'tipe' => $tipe]);
              Cart::destroy();
            return redirect()->route('selamat.terimakasih');
            
    }
    public function updateureturn(){
           //get value
            $url_no = Input::get('url_no');
            $trx_id = Input::get('trx_id');
            $status = Input::get('status');
            $tipe = Input::get('tipe');
            $d = Input::get('d');
            //insert value
            $ureturn = new ureturn();
            $ureturn->url_no = $url_no;
            $ureturn->trx_id = $trx_id;
            $ureturn->status = $status;
            $ureturn->tipe = $tipe;
            $ureturn->d = $d;
            $ureturn->save();
            //update status
            $userid = Auth::user()->id;
             $order = DB::table('orders')
                ->where('user_id', '=', $userid)
                ->orderBy('updated_at', 'desc')
                ->get();
           
                foreach($order as $key => $row)
            {
           
                   if($key == 0){
                       $order_id = $row->id;
                        }
						
            }
          
            Order::where('id', $order_id)
              ->update(['trx_id' => $trx_id, 'status' => $status, 'tipe' => $tipe]);
              Cart::destroy();
            return redirect()->route('selamat.terimakasih');
            
    }
    public function getlastid(){
           
            
            $user1 = DB::table('orders')
                ->where('user_id', '=', 532)
                ->orderBy('created_at', 'desc')
                ->get();
                $user2 = DB::table('orders')
                ->where('user_id', '=', 533)
                ->orderBy('created_at', 'desc')
                ->get();
          foreach($user1 as $key => $row)
            {
           
                   if($key == 0){
                       $id1 = $row->id;
                        }
						
            }
             foreach($user2 as $key => $row)
            {
           
                   if($key == 0){
                       $id2 = $row->id;
                        }
						
            }
           
             $query1 = DB::table('orders')
                ->where('id', '=', $id1)
                ->get();
                 $query2 = DB::table('orders')
                ->where('id', '=', $id2)
                ->get();
            dd($user1, $id1,$user2, $id2, $query1, $query2);
            
           //return view('profil.terimakasih', compact('order'));
     
    }
    

    public function getnotify(){

            $notify = new notifikasi();
            
            $notify->status = Input::get('status');
            $notify->trx_id = Input::get('trx_id');
            $notify->sid =Input::get('sid');
            $notify->product = Input::get('product');
            $notify->quantity = Input::get('quantity');
            $notify->merchant = Input::get('merchant');
            $notify->buyer = Input::get('buyer');
            $notify->total = Input::get('total');
            $notify->no_rekening_deposit = Input::get('no_rekening_deposit');
            $notify->action = Input::get('action');
            $notify->comments = Input::get('comments');
            $notify->referer = Input::get('referer');
            $notify->save();
 
    
        
    }
    public function getnotify2(){

            $notify = new notifikasi();
            $notify->status = 'berhasil';
            $notify->trx_id = '24677';
            $notify->sid = 'asd245235234234123xd123123d1';
            $notify->product = 'inv-1201930';
            $notify->quantity = '1';
            $notify->merchant = 'dika';
            $notify->buyer = 'ruswito';
            $notify->total = '14900';
            $notify->no_rekening_deposit = 'asd';
            $notify->action = 'payment';
            $notify->comments = 'asdasd';
            $notify->referer = 'https://my.ipaymu.com';
            $notify->save();
    
        
    }
     public function detailorder()
    {
        //
      
        $barangs = DB::table('barang_order')
                
                ->get();
       dd($barangs);
    }
   
}

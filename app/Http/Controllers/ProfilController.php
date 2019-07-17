<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\Order;
use View;
use Illuminate\Support\Facades\DB;
use App\User;
use App\City;
use App\Barang_order;
use App\Barang;
use Illuminate\Support\Facades\Auth;
use RajaOngkir;
use Barryvdh\DomPDF\Facade as PDF;
class ProfilController extends Controller
{
    //
   
    public function index()
    {
        //
        $user_id = Auth::user()->id;
        $users = user::orderBy('id', 'desc')->where('id', '=', $user_id)->get();
        $province_id = DB::table('users')->select('province_id')->where('id', '=', $user_id)->get();
        $city_id = DB::table('users')->select('city_id')->where('id', '=', $user_id)->get();
        foreach($city_id as $row) { 
                $id_kota = $row->city_id; 
            }
        foreach($province_id as $row) { 
                $province_id = $row->province_id; 
            }    
        $kota = RajaOngkir::Kota()->find($id_kota);
        $prov = RajaOngkir::Provinsi()->find($province_id);
        $getcity = json_decode(json_encode($kota),true);
        $getprov = json_decode(json_encode($prov),true);
       
        
        
    
        return view('profil.index', compact('users','getcity','getprov'));
    }
   
    public function edit($id)
    {
        //
       
        $users = user::findorfail($id);
        $kota = RajaOngkir::Kota()->all();
        $getkota = RajaOngkir::Kota()->find(179);
        $prov = RajaOngkir::Provinsi()->all();

        return view('profil.editprofil', compact('users','kota','prov','getkota'));
    }
    public function update(Request $request, $id)
    
    {
        //
       
        $users = user::findorfail($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->city_id = $request->city_id;
        $users->province_id = $request->province_id;
        $users->no_hp = $request->no_hp;
        $users->kode_pos = $request->kode_pos;
        $users->tgl_lahir = $request->tgl_lahir;
        $users->alamat = $request->alamat;

        if($request->file('gambar') == "")
        {
            $users->gambar = $users->gambar;
        } 
        else
        {
            $file   = $request->file('gambar');
            $gambar = $file->getClientOriginalName();
            $request->file('gambar')->move("image/", $gambar);
            $users->gambar = $gambar;
        }
        $users->save();
         return redirect()->route('profil.index');
     }
     public function getcity()
    {
        //
       
       
        $kota = RajaOngkir::Kota()->all();
        $result = json_decode(json_encode($kota),true);
      
        dd($kota);
       
    }
      public function dump()
    {
        //
       
       
        $json = '[{"var1":"9","var2":"16","var3":"16"},{"var1":"8","var2":"15","var3":"15"}]';
        $data = json_decode($json, true);
        foreach($data as $item) { //foreach element in $arr
                $uses = $item['var1']; //etc
            }
        var_dump($uses);
       
    }

    public function getkota()
    {
                $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=179",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: 550bde6b48e28a289112aa0bd05331e7"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
         
          $json = json_decode($response, true);
          $result = $json['rajaongkir']['results'];
         
          dd($result);
            
        }
       
       
    }

    public function getsingle()
    {
                $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=501",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: 550bde6b48e28a289112aa0bd05331e7"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
         
          $json = json_decode($response, true);
          $result = $json['rajaongkir']['results'];
         
        
            dd($result);
        }
       
       
    }

    
    public function order()
    {
        //
       $user_id = Auth::user()->id;
       $orders = DB::table('users')->rightJoin('orders', 'orders.user_id', '=', 'users.id')->where('orders.user_id', '=', $user_id)->orderBy('orders.created_at','desc')->get();
        return view('profil.order', ['orders' => $orders]);
    }
    public function show($id)
    {
        //
        $user_id = Auth::user()->id;
        $orders = order::findOrFail($id);
        $barangs = DB::table('barang_order')
                ->leftJoin('barangs', 'barang_order.barang_id', '=', 'barangs.id')
                ->leftJoin('orders', 'barang_order.order_id', '=', 'orders.id')
                ->where( 'orders.id', '=', $id)
                ->get();
        return view('profil.showorder',compact('orders','barangs'));
    }
   
    public function cancel($id)
    {
        //
        $orders = order::findOrFail($id);
        $orders->delete();
        return view('profil.order');
    }
     public function downloadPDF($id)
    {
         $user_id = Auth::user()->id;
         $users = user::orderBy('id', 'desc')->where('id', '=', $user_id)->get();
         $orders = order::orderBy('id', 'desc')->where('id', '=', $id)->get();
         $barangs = DB::table('barang_order')
                ->leftJoin('barangs', 'barang_order.barang_id', '=', 'barangs.id')
                ->leftJoin('orders', 'barang_order.order_id', '=', 'orders.id')
                 ->where( 'orders.id', '=', $id)
                ->get();
        $pdf = PDF::loadView('profil.pdfexport', compact('barangs','orders','users'));
        return $pdf->download('pdf');
    }
     public function cetakinvoice($id)
    {
         $user_id = Auth::user()->id;
         $users = user::orderBy('id', 'desc')->where('id', '=', $user_id)->get();
         $province_id = DB::table('users')->select('province_id')->where('id', '=', $user_id)->get();
        $city_id = DB::table('users')->select('city_id')->where('id', '=', $user_id)->get();
        foreach($city_id as $row) { 
                $id_kota = $row->city_id; 
            }
        foreach($province_id as $row) { 
                $province_id = $row->province_id; 
            }    
        $kota = RajaOngkir::Kota()->find($id_kota);
        $prov = RajaOngkir::Provinsi()->find($province_id);
        $getcity = json_decode(json_encode($kota),true);
        $getprov = json_decode(json_encode($prov),true);
        $city_name = $getcity['city_name'];
        $prov_name = $getcity['province'];
         $orders = order::orderBy('id', 'desc')->where('id', '=', $id)->get();
         $barangs = DB::table('barang_order')
                ->leftJoin('barangs', 'barang_order.barang_id', '=', 'barangs.id')
                ->leftJoin('orders', 'barang_order.order_id', '=', 'orders.id')
                 ->where( 'orders.id', '=', $id)
                ->get();
       
        return view('profil.invoice',compact('users','orders','barangs','city_name','prov_name'));
    }
}

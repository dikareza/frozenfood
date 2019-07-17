<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\Order;
use View;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Barang_order;
use App\Barang;
use Excel;
use RajaOngkir;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
    {               
        $this->middleware('auth:admin');
    }
    public function index()
    {
        //
        
        $orders = DB::table('users')->rightJoin('orders', 'orders.user_id', '=', 'users.id')->orderBy('orders.created_at','desc')->get();
        return view('admin.order', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       
                
        $orders = order::findOrFail($id);
        $user_id = $orders->user_id;
        
        $users   = DB::table('orders')
                ->leftJoin('users', 'orders.user_id', '=', 'users.id')
                ->where('orders.user_id', '=', $user_id)
                ->Where('orders.id', '=', $id)
                ->get();
        $province_id = DB::table('users')->select('province_id')->where('id', '=', $user_id)->get();
        $city_id = DB::table('users')->select('city_id')->where('id', '=', $user_id)->get();
        foreach($city_id as $row) { 
                $idkota = $row->city_id; 
            }
        foreach($province_id as $row) { 
                $province_id = $row->province_id; 
            }   
        $kota = RajaOngkir::Kota()->find($idkota);
        $prov = RajaOngkir::Provinsi()->find($province_id);
        $getcity = json_decode(json_encode($kota),true);
        $getprov = json_decode(json_encode($prov),true);       
        $barangs = DB::table('barang_order')
                ->leftJoin('barangs', 'barang_order.barang_id', '=', 'barangs.id')
                ->leftJoin('orders', 'barang_order.order_id', '=', 'orders.id')
                ->where('orders.id', '=', $id)
                ->get();
        return view('admin.editOrder',compact('orders','barangs','users','getcity','getprov'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
           $order = order::findOrFail($id);
            $order->no_resi = $request->no_resi;
            $order->save();
            $notification = array(
        	'message' => 'Nomor Resi behasil di tambahkan', 
        	'alert-type' => 'success'
        );

            return redirect()->route('order.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       
    }
    public function exportorder()
    {
         $orders = DB::table('users')->rightJoin('orders', 'orders.user_id', '=', 'users.id')->orderBy('orders.created_at','desc')->get();
        return view('admin.exportorder', ['orders' => $orders]);
    }
    public function downloadExcel($type)
    {
       
        $data =  order::select('orders.trx_id as nomor_transaksi _ipaymu','orders.status','orders.total','users.name as member','orders.no_resi','orders.created_at as tanggal')->leftJoin('users', 'orders.user_id', '=', 'users.id')->get()->toArray();
        return Excel::create('data_transaksi', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}

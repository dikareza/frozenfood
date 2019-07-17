<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\User;
use View;
use RajaOngkir;
use Excel;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
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
        $users = user::orderBy('id', 'desc')->get();

        return view('admin.member', ['users' => $users]);
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
         $users = user::orderBy('id', 'desc')->where('id', '=', $id)->get();
         $province_id = DB::table('users')->select('province_id')->where('id', '=', $id)->get();
        $city_id = DB::table('users')->select('city_id')->where('id', '=', $id)->get();
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
        return view('admin.showuser',compact('users','getcity','getprov'));
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
        $users = user::findOrFail($id);
        $users->delete();
        return redirect()->route('user.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
    public function exportuser()
    {
         $users = user::orderBy('id', 'desc')->get();
        return view('admin.exportuser', ['users' => $users]);
    }
    public function downloadExcel($type)
    {
       
        $data =  user::select('name as nama','email','no_hp as nomor_ponsel', 'tgl_lahir as tanggal lahir','alamat')->get()->toArray();
        return Excel::create('data_member', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}

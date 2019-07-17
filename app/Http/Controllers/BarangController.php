<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\Barang;
use View;
use Image;
use App\Kategori;
use Illuminate\Support\Facades\DB;
use Excel;
class BarangController extends Controller
{
    public function __construct()
    {               
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        // $barangs = barang::orderBy('id', 'desc')->get();
        $barangs = DB::table('kategoris')->rightJoin('barangs', 'barangs.kat_id', '=', 'kategoris.id')->get();
        return view('admin.barang', ['barangs' => $barangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $joins = DB::table('kategoris')->get();
        return view('admin.addBarang', compact('joins'));
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
        // $file = $request->file('gambar');
        // $gambar = $file->getClientOriginalName();
        // $file = time().'.'.$request->$gambar->getClientOriginalExtension();
        // $request->$gambar->move(public_path('barang'), $file);
        // $path = 'upload/images';
        // $file->move($path, $gambar);

            $barang = new barang();
            $barang->nama = $request->nama;
            $barang->kat_id = $request->kat_id;
            $barang->harga = $request->harga;
            $barang->stok = $request->stok;
            $barang->berat = $request->berat;
            $barang->deskripsi = $request->deskripsi;

            $file   = $request->file('gambar');
            $gambar = $file->getClientOriginalName();
            $request->file('gambar')->move("image/", $gambar);
            $barang->gambar = $gambar;
            $barang->save();

            $joins = DB::table('kategoris')->get();
             return redirect()->route('barang.index', compact('barangs'))->with('alert-success','Data berhasil Disimpan.');
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
        $barangs = barang::findOrFail($id);

        return view('barang.show', ['barangs' => $barangs]);
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
        $barangs = barang::findOrFail($id);
        $joins = DB::table('kategoris')->get();
        return view('admin.editBarang',compact('barangs','joins'));
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
            $barang = barang::findOrFail($id);
            $barang->nama = $request->nama;
            $barang->kat_id = $request->kat_id;
            $barang->harga = $request->harga;
            $barang->stok = $request->stok;
            $barang->berat = $request->berat;
            $barang->deskripsi = $request->deskripsi;

            if($request->file('gambar') == "")
            {
                $barang->gambar = $barang->gambar;
            } 
            else
            {
                $file   = $request->file('gambar');
                $gambar = $file->getClientOriginalName();
                $request->file('gambar')->move("image/", $gambar);
                $barang->gambar = $gambar;
            }
            $barang->save();
           return redirect()->route('barang.index')->with('alert-success', 'Data Berhasil Dihapus.');
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
        $barang = barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
     public function exportbarang()
    {
         $barangs = DB::table('kategoris')->rightJoin('barangs', 'barangs.kat_id', '=', 'kategoris.id')->get();
        return view('admin.exportBarang', ['barangs' => $barangs]);
    }
    public function downloadExcel($type)
    {
       
        $data =  barang::select('barangs.nama', 'kategoris.nama_kat as kategori', 'barangs.harga', 'barangs.stok')->leftJoin('kategoris', 'barangs.kat_id', '=', 'kategoris.id')->get()->toArray();
        return Excel::create('data_barang', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
}

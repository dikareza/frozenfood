<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use App\Kategori;
use View;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
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
        
        $kategoris = kategori::orderBy('id', 'desc')->get();

        return view('admin.kategori', ['kategoris' => $kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.addKategori');
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
        $kategori = new kategori();
        $kategori->nama_kat = $request->nama_kat;
        $kategori->save();
        return redirect()->route('kategori.index')->with('alert-success','Data berhasil Disimpan.');
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
         $kategoris = kategori::findOrFail($id);

        return view('admin.showKategori', ['kategoris' => $kategoris]);
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
        $kategoris = kategori::findOrFail($id);
        return view('admin.editKategori',compact('kategoris'));
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
        $kategori = kategori::findOrFail($id);
        $kategori->nama = $request->nama;
        $kategori->save();
        return redirect()->route('kategori.index')->with('alert-success', 'Data Berhasil Diubah.');
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
        $kategori = kategori::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('alert-success', 'Data Berhasil Dihapus.');
    }
}

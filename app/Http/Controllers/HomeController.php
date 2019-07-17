<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contact;
use App\Barang;
use App\Kategori;
use Illuminate\Support\Facades\Input;
use RajaOngkir;
use Gloudemans\Shoppingcart\Facades\Cart;
class HomeController extends Controller
{
     public function __construct() {
        return view('front.home');
        //$this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
          
       
      
         $barangs = DB::table('kategoris')->rightJoin('barangs', 'barangs.kat_id', '=', 'kategoris.id')->get();
         $kategoris = DB::table('kategoris')->get();
         
        return view('front.home', compact('barangs','kategoris'));
    
    }
    public function search()
        {
            
            $keyword=  Input::get('keyword');
            $barangs = DB::table('barangs')->where('nama', 'like', "%$keyword%")->get();
            
            //  $barangs= barang::find($keyword);
             $kategoris = DB::table('kategoris')->get();

            //return display search result to user by using a view
           return view('front.result', compact('barangs','kategoris','keyword'));
        }
    public function detail($id)
    {
        //
        
        $barangs = barang::findOrFail($id);
        $kategoris = DB::table('kategoris')->get();
        return view('front.prodDetail',compact('barangs','kategoris'));
    }
     public function kategori($id)
    {
        //
        $kategoris = DB::table('kategoris')->get();
        $barangs = DB::table('kategoris')->rightJoin('barangs', 'barangs.kat_id', '=', 'kategoris.id')->where('kategoris.id', $id)->get();
        return view('front.prodKategori',compact('barangs','kategoris'));
    }
    public function cancel()

    {
         Cart::destroy();
          
      
         $barangs = DB::table('kategoris')->rightJoin('barangs', 'barangs.kat_id', '=', 'kategoris.id')->get();
         $kategoris = DB::table('kategoris')->get();
         ;
        return view('front.home', compact('barangs','kategoris'));
    
    }
   
}

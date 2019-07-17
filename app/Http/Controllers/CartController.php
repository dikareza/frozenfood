<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
     public function index(){
       	 $cartItems = Cart::content();
        return view('cart.index', compact('cartItems'));

    }
    public function addItem(Request $request, $id){
        $barangs = barang::find($id); // get prodcut by id
        Cart::add($id, $barangs->nama, 1,$barangs->harga,['img' => $barangs->gambar,'stock' => $barangs->stok,'berat' => $barangs->berat]);
       return back();
    }
    public function destroy($id){
        Cart::remove($id);
        return back(); // will keep same page
    }
     public function update(Request $request, $id)
    {
        $qty = $request->qty;
         $proId = $request->proId;
         $rowId = $request->rowId;
          Cart::update($rowId,$qty); // for update
          $cartItems = Cart::content(); // display all new data of cart
         return view('cart.upCart', compact('cartItems'))->with('status', 'cart updated');

          }

}

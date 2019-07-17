<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Barang;

class Order extends Model
{
	  protected $fillable = ['trx_id','invoice_number', 'sid', 'alamat2', 'city_id2', 'province_id2','kode_pos2','total', 'status', 'tipe','kurir', 'layanan', 'ongkir'];

    public function orderFields() {
        return $this->belongsToMany(barang::class)->withPivot('qty', 'total');
    }

     public static function createOrder($totalcheckout,$inv_no,$sid,$nama, $layanan, $ongkos, $alamat2, $city2, $prov2, $kode_pos2) {
        $user = Auth::user();
        $order= $user->order()->create(['invoice_number' => $inv_no, 'sid' => $sid, 'total' => $totalcheckout, 'status' => 'pending', 'kurir' => $nama, 'layanan' => $layanan, 'ongkir' => $ongkos, 'alamat2' => $alamat2, 'city_id2' => $city2, 'province_id2' => $prov2, 'kode_pos2' => $kode_pos2]);


        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) {
            $order->orderFields()->attach($cartItem->id, ['qty' => $cartItem->qty, 'total_brg' => $cartItem->qty * $cartItem->price]);
        }
    }

}


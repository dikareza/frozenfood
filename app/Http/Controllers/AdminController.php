<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Barang;
use App\User;
use App\Order;
class AdminController extends Controller
{
    //
    public function __construct()
	{				
		$this->middleware('auth:admin');
	}
	 public function index()
    {
    	// return dd(Auth::guard()->provider());
    	// Auth::guard('admin');

    	// dd(Auth::guest());
    	// return dd(Auth::guard('web')->check());
        $order = Order::count();
        $user = User::count();
        $barang = Barang::count();
    	return view('admin.dashboard', compact('order','user','barang'));
    }
}

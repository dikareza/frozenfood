<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//back
Route::get('/admin-home', 'AdminController@index');
Route::get('/barang', 'BarangController@index');
Route::resource('barang','BarangController');
Route::get('/kategori', 'KategoriController@index');
Route::resource('kategori','KategoriController');
Route::get('/member', 'UserController@index');
Route::resource('user','UserController');
Route::get('/order', 'OrderController@index');
Route::resource('order','OrderController');
Route::get('/export/barang', 'BarangController@exportbarang');
Route::get('downloadBarang/{type}', 'BarangController@downloadExcel');
Route::get('/export/order', 'OrderController@exportorder');
Route::get('downloadOrder/{type}', 'OrderController@downloadExcel');
Route::get('/export/user', 'UserController@exportuser');
Route::get('downloadMember/{type}', 'UserController@downloadExcel');
Route::get('/readme', function () {
   // return view('layouts.signin');
    return view('readme');
});

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/search','HomeController@search');
Route::get('/detailproduk/{id}','HomeController@detail')->name('home.detail');
Route::get('/kategoriproduk/{id}','HomeController@kategori')->name('home.kategori');
// cart
Route::get('/cart', 'CartController@index');
Route::get('/cart/addItem/{id}', 'CartController@addItem');
Route::get('/cart/remove/{id}', 'CartController@destroy');
Route::get('/cart/update/{id}', 'CartController@update');
Route::get('/pengiriman/{totalberat}', 'CheckoutController@index');
Route::post('/updatealamat/{id}/{totalberat}', 'CheckoutController@update')->name('checkout.update');
Route::get('/pembayaran/{kurir}/{totalberat}', 'CheckoutController@bayar')->name('checkout.bayar');
Route::post('/pembayaran2/{id}', 'CheckoutController@bayar2')->name('checkout.bayar2');
Route::get('/ongkir', 'CheckoutController@ongkir');
Route::get('/kode_pos', 'CheckoutController@kode_pos');
Route::get('/kota', 'CheckoutController@get_kota');


Route::get('/fetch', 'CheckoutController@fetch')->name('dynamicdependent.fetch');

Route::get('/ongkir1', 'CheckoutController@ongkir1');
Route::post('/formvalidate/{totalcheckout}/{name}/{qty}', 'CheckoutController@formvalidate');
Route::post('/payment/{totalcheckout}/{inv_no}/{nama}/{layanan}/{ongkos}/{alamat2}/{city2}/{prov2}/{kode_pos2}', 'CheckoutController@payment');
Route::post('/repay/{id}/{invoice_number}/{total}', 'CheckoutController@repay');
Route::get('/notify', 'CheckoutController@notify');
Route::get('/getnotify', 'CheckoutController@getnotify');
Route::get('/cekstatus', 'CheckoutController@cekstatus');
Route::get('/getnotify2', 'CheckoutController@getnotify2');
Route::get('/getlastid', 'CheckoutController@getlastid');
Route::get('/cancel', 'HomeController@cancel');
Route::get('/xml', 'CheckoutController@xml');
Route::get('/newstok', 'CheckoutController@newstok');
Route::get('/barang_order', 'CheckoutController@detailorder');
Route::get('/terimakasih', 'CheckoutController@ureturn');
Route::get('/terimakasih-update', 'CheckoutController@updateureturn');
Route::get('/selamat', function () {
    return view('profil.terimakasih');
})->name('selamat.terimakasih');
Route::get('/signin', function () {
   // return view('layouts.signin');
    return view('layouts.signin');
});
Route::get('/contoh', function () {
   // return view('layouts.signin');
    return view('profil.pdfexport');
});
Route::get('/front', function () {
   // return view('layouts.signin');
    return view('front.home');
});
Route::get('/detail', function () {
   // return view('layouts.signin');
    return view('front.prodDetail');
});
Route::get('/loginn', function () {
   // return view('layouts.signin');
    return view('front.login');
});

Route::group(['prefix' => 'admin', 'namespace' => 'AdminAuth', 'middleware' => 'web', 'guard' => 'admin'], function () {

    # Authentication Routes...
    $this->get('login', 'LoginController@showLoginForm'); //Done
    $this->post('login', 'LoginController@login');
    $this->post('logout', 'LoginController@logout');

    # Registration Routes...
    $this->get('register', 'RegisterController@showRegistrationForm'); //Done
    $this->post('register', 'RegisterController@register'); //Done

    # Password Reset Routes...
    $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm');
    $this->post('password/reset', 'ResetPasswordController@reset');
    $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm');
});
Auth::routes();
//font

//profil
Route::group(['middleware' => 'auth:user'], function() {
Route::resource('profil','ProfilController');
Route::get('/getcity', 'ProfilController@getcity');
Route::get('/getkota', 'ProfilController@getkota');
Route::get('/getsingle', 'ProfilController@getsingle');
Route::get('/dump', 'ProfilController@dump');
Route::get('/editprofil/{id}', 'ProfilController@edit');
Route::get('/pembelian', 'ProfilController@order');
Route::post('/cancel/{id}', 'ProfilController@cancel');
Route::get('/detail/{id}', 'ProfilController@show');
Route::get('/downloadPDF/{id}', 'ProfilController@downloadPDF');
Route::get('/invoice/{id}',  'ProfilController@cetakinvoice');
});


Route::get('api/contact','HomeController@apiContact')->name('api/contact');
Route::resource('contact','ContactController');

Route::resource('contact', 'HomeController');

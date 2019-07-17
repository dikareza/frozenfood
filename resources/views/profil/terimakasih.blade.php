@extends('layouts.front')

@section('content')

<h1 align="center">{{Auth::user()->name}} Terima Kasih</h1>

<p align="center" class="panel-body">
   Pesanan anda telah berhasil, silahkan cek transaksi anda di menu profile.</p>
    

@endsection
 
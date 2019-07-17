<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //

    protected $table = 'kategori';

    public function barang() {
        return $this->belongsToMany('App\Barang');
    }
}

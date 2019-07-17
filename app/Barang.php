<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Barang extends Model
{
    //
    protected $table = 'barangs';

    public function kategori() {

        return $this->belongsToMany('kategoris');
    }
}

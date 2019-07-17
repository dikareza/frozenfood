<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	 protected $fillable = ['nama_kat'];
	  protected $table = 'kategoris';
    //
	 public function barang() {
        return $this->belongsToMany('barangs');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    //
    protected $fillable = ['status', 'trx_id','sid', 'product', 'quantity','merchant', 'buyer', 'total','no_rekening_deposit','action','comments','referer'];
}

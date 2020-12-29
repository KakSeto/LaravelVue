<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = "produks";
    protected $fillable = ['nama', 'merk', 'storage', 'tahun', 'garansi','status']; 
}

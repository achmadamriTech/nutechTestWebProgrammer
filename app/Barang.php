<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $table = "barang";
    protected $fillable = [
        'foto_barang', 'nm_barang','harga_beli','harga_jual','stok'
    ];
}

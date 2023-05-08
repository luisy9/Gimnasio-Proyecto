<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facturas extends Model
{
    use HasFactory;
    public function factura()
    {
        return $this->belongsToMany(facturas::class, 'facturas', 'user_id', 'tarifa_id');
    }
}

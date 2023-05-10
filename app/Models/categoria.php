<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'categoria';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nombre_categoria',
        'imagen_categoria',
    ];
}

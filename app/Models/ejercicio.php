<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ejercicio extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'ejercicio';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nombre_ejercicio',
        'imagen_ejercicio',
        'categoria_id',
    ];
}

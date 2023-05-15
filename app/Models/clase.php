<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clase extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'clase';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'nombre_clase',
        'descripcion',
        'imagen',
    ];
}

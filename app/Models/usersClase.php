<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersClase extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'usuario_clase';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'user_id',
        'clase_id',
        'fecha_clase',
        'hora_clase',
    ];
}

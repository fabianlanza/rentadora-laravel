<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservaciones extends Model
{
    use HasFactory;
    // use softDeletes;
    
    protected $fillable = [
        'nombre_cliente',
        'cedula',
        'seguro',
        'fk_auto',
        'fk_user', 
        'fecha_inicio',
        'fecha_fin',
        'cantidad_dias_reservado',
    ];
    
    // Define relacion con Modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }
    
    // Define relacion con Modelo Autos
    public function auto()
    {
        return $this->belongsTo(Autos::class, 'fk_auto');
    }
}

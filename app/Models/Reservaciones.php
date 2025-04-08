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
        'fk_auto', // Changed from auto_id to fk_auto to match migration
        'fecha_inicio',
        'fecha_fin',
        'cantidad_dias_reservado', // Changed from dias_reservados to match migration
    ];
    
    // Define relationship with Auto model
    public function auto()
    {
        return $this->belongsTo(Autos::class, 'fk_auto');
    }
}

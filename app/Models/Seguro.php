<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seguro extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = [
      'Tipo_seguro',
        'Empresa',
        'Descripcion',
        'precio_base'
    ];
}

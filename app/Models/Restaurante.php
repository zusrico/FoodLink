<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    protected $primaryKey = 'id_restaurante';
    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion',
        'telefono',
        'categoria',
        'horario',
        'estado',
    ];

    /**
     * Relación: Un restaurante puede tener muchos productos
     */
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_restaurante');
    }
}

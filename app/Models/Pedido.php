<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $primaryKey = 'id_pedido';
    protected $fillable = [
        'id_usuario',
        'fecha_pedido',
        'total',
        'estado_pedido',
        'direccion_entrega',
        'metodo_pago',
    ];

    /**
     * Relación: Un pedido pertenece a un usuario
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    /**
     * Relación: Un pedido puede tener muchos detalles
     */
    public function detalles()
    {
        return $this->hasMany(DetallePedido::class, 'id_pedido');
    }
}

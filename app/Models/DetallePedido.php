<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $primaryKey = 'id_detalle';
    protected $table = 'detalle_pedidos';
    protected $fillable = [
        'id_pedido',
        'id_producto',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    /**
     * Relación: Un detalle pertenece a un pedido
     */
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido');
    }

    /**
     * Relación: Un detalle pertenece a un producto
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}

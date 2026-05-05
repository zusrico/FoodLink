<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('id_pedido');
            $table->foreignId('id_usuario')->constrained('users', 'id')->onDelete('cascade');
            $table->dateTime('fecha_pedido')->default(now());
            $table->decimal('total', 10, 2)->default(0);
            $table->string('estado_pedido')->default('pendiente');
            $table->text('direccion_entrega')->nullable();
            $table->string('metodo_pago')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};

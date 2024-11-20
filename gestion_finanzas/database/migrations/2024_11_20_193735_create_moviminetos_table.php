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
        Schema::create('moviminetos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cuenta')->constrained('cuentas');
            $table->foreignId('id_tipo_movimiento')->constrained('catalogo_tipo_movimientos');
            $table->foreignId('id_categoria')->constrained('catalogo_categorias');
            $table->decimal('cantidad', 10, 2);
            $table->date('fecha');
            $table->string('descripcion', 100)->nullable();
            $table->foreignId('id_usuario')->nullable()->constrained('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moviminetos');
    }
};

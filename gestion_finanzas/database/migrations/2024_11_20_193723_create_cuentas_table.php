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
        Schema::create('cuentas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('numero', 20)->unique();
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->foreignId('id_tipo_cuenta')->constrained('catalogo_tipo_cuentas');
            $table->decimal('balance_inicial', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuentas');
    }
};

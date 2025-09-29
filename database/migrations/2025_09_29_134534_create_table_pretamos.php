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
        Schema::create('pretamos', function (Blueprint $table) {
            $table->id();
             $table->foreignId('book_id')->constrained('libros')->onDelete('cascade');
        $table->foreignId('member_id')->constrained('miembros')->onDelete('cascade');
        $table->date('fecha_prestamo');
        $table->date('fecha_devolucion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pretamos');
    }
};

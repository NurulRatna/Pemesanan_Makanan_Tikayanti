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
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('nama_pemesan');
        $table->string('nomor_meja');
        $table->foreignId('menu_id')->constrained('menus')->onDelete('cascade');
        $table->integer('jumlah');
        $table->integer('total_harga');
        $table->string('status')->default('Diproses');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

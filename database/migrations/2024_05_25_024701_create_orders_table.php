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
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_payment');
            $table->unsignedBigInteger('id_product');
            $table->text('alamat');
            $table->string('bukti_transaksi');
            $table->integer('harga_product')->nullable();
            $table->integer('qty')->nullable();
            $table->timestamps();
    
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_payment')->references('id')->on('payments')->onDelete('cascade');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
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

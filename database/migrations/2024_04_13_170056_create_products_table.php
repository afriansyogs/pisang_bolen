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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('foto_product')->nullable();
            $table->string('variant_product');
            $table->text('description_product');
            $table->decimal('harga_product', 10, 3);
            $table->bigInteger('jumlah_product');
            $table->enum('status_publish', ['publish', 'draft']);
            $table->string('slug_link');
            $table->timestamps();
            $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

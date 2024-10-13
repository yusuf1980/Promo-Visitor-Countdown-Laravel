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
        Schema::create('social_proofs', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pembeli
            $table->string('email')->nullable();
            $table->string('product'); // Nama produk
            $table->boolean('status')->default(true);
            $table->timestamp('purchased_at'); // Waktu pembelian
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_proofs');
    }
};

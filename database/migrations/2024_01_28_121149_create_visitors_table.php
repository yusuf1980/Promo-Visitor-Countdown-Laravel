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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->integer('promo_id')->unsigned();
            $table->timestamp('launch_date')->useCurrent();
            $table->string('ip');
            $table->text('detail')->nullable();
            $table->timestamps();

            $table->foreign('promo_id')->references('id')->on('promos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};

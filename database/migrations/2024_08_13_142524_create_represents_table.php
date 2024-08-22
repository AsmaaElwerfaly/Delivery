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
        Schema::create('represents', function (Blueprint $table) {
            $table->id();
            $table->string('name_represent');
            $table->string('code');
            $table->string('password');
            $table->bigInteger('branche_id')->unsigned();
            $table->foreign('branche_id')->references('id')->on('branches')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('represents');
    }
};

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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('customer_code');
            $table->string('customer_name');
            $table->string('sender_name');
            $table->string('represent_name');
            $table->integer('sender_num');
            $table->integer('represent_num');
            $table->string('package_notes')->nullable();
            $table->string('openable');
            $table->string('condition_cargo')->nullable();
            $table->string('count_cargo');
            $table->double('balance_cargo');
            $table->double('balance_commossion');
            $table->double('balance_order');
            $table->string('cargo_code');
            $table->string('city');
            $table->string('part');
            $table->string('city_code');

            $table->bigInteger('branche_id')->unsigned();
            $table->foreign('branche_id')->references('id')->on('branches')->cascadeOnDelete();

            $table->bigInteger('represent_id')->nullable()->unsigned();
            $table->foreign('represent_id')->references('id')->on('represents')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};

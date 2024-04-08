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
        Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id')->nullable();
        $table->unsignedBigInteger('depart_flight_id')->nullable();
        $table->unsignedBigInteger('return_flight_id')->nullable();
        $table->unsignedBigInteger('flight_type_id')->nullable();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('depart_flight_id')->references('id')->on('flights')->onDelete('cascade');
        $table->foreign('return_flight_id')->references('id')->on('flights')->onDelete('cascade');
        $table->foreign('flight_type_id')->references('id')->on('flight_types')->onDelete('cascade');
        $table->decimal('total_price', 8, 2)->nullable();
        $table->string('status')->default('pending');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

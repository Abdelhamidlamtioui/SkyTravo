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
        if (!Schema::hasTable('flights')) {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('airline_id')->nullable();
            $table->unsignedBigInteger('origin_airport_id')->nullable();
            $table->unsignedBigInteger('destination_airport_id')->nullable();
            $table->foreign('airline_id')->references('id')->on('airlines')->onDelete('cascade');
            $table->foreign('origin_airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->foreign('destination_airport_id')->references('id')->on('airports')->onDelete('cascade');
            $table->dateTime('departure_at');
            $table->dateTime('arrival_at');
            $table->decimal('economy_price', 8, 2)->nullable();
            $table->decimal('premium_economy_price', 8, 2)->nullable();
            $table->decimal('business_class_price', 8, 2)->nullable();
            $table->decimal('first_class_price', 8, 2)->nullable();
            $table->unsignedInteger('economy_seats')->default(0);
            $table->unsignedInteger('premium_economy_seats')->default(0);
            $table->unsignedInteger('business_class_seats')->default(0);
            $table->unsignedInteger('first_class_seats')->default(0);
            $table->string('flight_duration')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};

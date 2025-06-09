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
            $table->foreignId('user_id')->index();
            $table->foreignId('location_id')->index();
            $table->string('customer_name', 255)->nullable()->default(null);
            $table->dateTime('booking_date');
            $table->integer('booking_hour');
            $table->integer('number_of_persons');
            $table->string('status', 20);
            $table->integer('cancelled_at')->nullable();
            $table->foreignId('modified_by')->nullable();
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

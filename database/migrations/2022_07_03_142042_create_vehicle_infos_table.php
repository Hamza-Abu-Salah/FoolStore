<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('captain')->constrained('users')->cascadeOnDelete();
            $table->string('vehicle_brand');
            $table->string('vehicle_model');
            $table->string('vehicle_date');
            $table->string('vehicle_serial');
            $table->string('vehicle_plate_numbers');
            $table->string('vehicle_plate_letters');
            $table->string('vehicle_type');
            $table->string('work_region');
            $table->string('bank');
            $table->char('bank_number', 24);
            $table->string('bank_number_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_infos');
    }
};

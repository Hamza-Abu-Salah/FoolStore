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
        Schema::create('captain_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('captain_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('bank_id')->nullable()->constrained('banks')->cascadeOnDelete();
            $table->string('full_name')->nullable();
            $table->string('id_number')->nullable();
            $table->string('nationality')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('birthday')->nullable();
            $table->enum('birthday_type', ['1', '2'])->nullable();//هجري و ميلادي
            $table->string('avatar')->nullable();
            $table->string('medical_examination')->nullable();
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
        Schema::dropIfExists('captain_infos');
    }
};

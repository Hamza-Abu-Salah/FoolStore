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
        Schema::create('store_requests', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('email')->nullable();
            $table->string('classification')->nullable();
            $table->string('tax_certificate_Copy')->nullable();
            $table->string('registered')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('position')->nullable();
            $table->string('admin_name')->nullable();
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
        Schema::dropIfExists('store_requests');
    }
};

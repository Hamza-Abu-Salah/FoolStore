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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('store_email')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('status')->default(0);
            $table->string('mod_name')->nullable();
            $table->string('mod_phone')->nullable();
            $table->string('branch_count')->nullable();
            $table->string('expected_time')->nullable();
            $table->string('deli_price')->nullable();
            $table->string('min_orders')->nullable();
            $table->string('logo')->nullable();
            $table->string('background')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('classification')->nullable();
            $table->string('tax_certificate_Copy')->nullable();
            $table->string('registered')->nullable();
            $table->string('city')->nullable();
            $table->string('position')->nullable();
            $table->string('admin_name')->nullable();
            $table->boolean('is_registered')->default(0);
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
        Schema::dropIfExists('stores');
    }
};

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
        Schema::create('admin_urls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable()->constrained('admins')->cascadeOnDelete();
            $table->string('index')->nullable();
            $table->string('admins')->nullable();
            $table->string('users')->nullable();
            $table->string('leaders')->nullable();
            $table->string('sliders')->nullable();
            $table->string('categories')->nullable();
            $table->string('stores')->nullable();
            $table->string('coupons')->nullable();
            $table->string('reviews')->nullable();
            $table->string('orders')->nullable();
            $table->string('call-us')->nullable();
            $table->string('notifications')->nullable();
            $table->string('settings')->nullable();
            $table->string('admins/create')->nullable();
            $table->string('leaders/create')->nullable();
            $table->string('sliders/create')->nullable();
            $table->string('categories/create')->nullable();
            $table->string('stores/create')->nullable();
            $table->string('coupons/create')->nullable();
            $table->string('admins/details')->nullable();
            $table->string('leaders/details')->nullable();
            $table->string('sliders/details')->nullable();
            $table->string('categories/details')->nullable();
            $table->string('stores/details')->nullable();
            $table->string('coupons/details')->nullable();
            $table->string('reviews/details')->nullable();
            $table->string('orders/details')->nullable();
            $table->string('admins/edit')->nullable();
            $table->string('users/edit')->nullable();
            $table->string('leaders/edit')->nullable();
            $table->string('sliders/edit')->nullable();
            $table->string('categories/edit')->nullable();
            $table->string('stores/edit')->nullable();
            $table->string('coupons/edit')->nullable();
            $table->string('admins/delete')->nullable();
            $table->string('leaders/delete')->nullable();
            $table->string('sliders/delete')->nullable();
            $table->string('categories/delete')->nullable();
            $table->string('stores/delete')->nullable();
            $table->string('coupons/delete')->nullable();
            $table->string('reviews/delete')->nullable();
            $table->string('call-us/delete')->nullable();
            $table->string('notifications/delete')->nullable();
            $table->string('users/accept')->nullable();
            $table->string('leaders/accept')->nullable();
            $table->string('stores/accept')->nullable();
            $table->string('reviews/accept')->nullable();
            $table->string('call-us/reply')->nullable();
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
        Schema::dropIfExists('admin_urls');
    }
};

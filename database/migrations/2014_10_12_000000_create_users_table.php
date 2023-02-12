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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('phone')->unique();
            $table->string('avatar')->nullable();
            $table->enum('gender', ['1', '2'])->default('1');
            $table->integer('status')->default(1); // 0 => for captain waiting for user blocked, 1, 2
            $table->boolean('has_priority')->default(0);
            $table->boolean('is_captain')->default(false);
            $table->boolean('is_identity_verified')->default(false);
            $table->boolean('is_identity_verify_request')->default(0);
            $table->integer('stars')->default(0); //all stars counted
            $table->integer('raters_count')->default(0); //5 stars will be stars on this
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('country')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};

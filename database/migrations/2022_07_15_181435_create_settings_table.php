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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_title')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('email')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('vat_rate')->nullable();
            $table->string('cancel_value')->nullable();
            $table->string('min_shipping')->nullable();
            $table->string('max_shipping')->nullable();
            $table->string('fee')->nullable();
            $table->string('google_analytics')->nullable();
            $table->string('facebook_pixel')->nullable();
            $table->string('twitter_pixel')->nullable();
            $table->string('snapchat_pixel')->nullable();
            $table->string('tiktok_pixel')->nullable();
            $table->string('site_name')->nullable();
            $table->longText('site_desc')->nullable();
            $table->longText('site_keywords')->nullable();
            $table->string('fdappid')->nullable();
            $table->longText('about_app_ar')->nullable();
            $table->longText('about_app_en')->nullable();
            $table->longText('terms_and_conditions_ar')->nullable();
            $table->longText('terms_and_conditions_en')->nullable();
            $table->longText('usage_policy_ar')->nullable();
            $table->longText('usage_policy_en')->nullable();
            $table->longText('terms_and_conditions_store_ar')->nullable();
            $table->longText('terms_and_conditions_store_en')->nullable();
            $table->longText('terms_and_conditions_captain_ar')->nullable();
            $table->longText('terms_and_conditions_captain_en')->nullable();
            $table->longText('card_desc_ar')->nullable();
            $table->longText('card_desc_en')->nullable();
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
        Schema::dropIfExists('settings');
    }
};

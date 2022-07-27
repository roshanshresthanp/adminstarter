<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
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
            $table->string('company_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('phone')->nullable();
            $table->string('post_no')->nullable();
            $table->integer('province_no')->nullable();
            $table->integer('district_no')->nullable();
            $table->string('local_address')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('company_favicon')->nullable();
            $table->string('pan_vat')->nullable();
            $table->string('home_bg_img')->nullable();
            // $table->string('projects_completed')->nullable();
            // $table->string('total_employees')->nullable();
            // $table->string('happy_clients')->nullable();
            // $table->longText('aboutus')->nullable();
            $table->string('total_learner')->nullable();
            $table->string('total_nationality')->nullable();
            $table->string('total_activity')->nullable();
            $table->text('brief_description')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('youtube')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('opening_time')->nullable();
            $table->longText('map_url')->nullable();
            $table->string('subscribe_sub_title')->nullable();
            $table->string('subscribe_main_title')->nullable();
            $table->string('course_sub_title')->nullable();
            $table->string('course_main_title')->nullable();
            $table->string('news_sub_title')->nullable();
            $table->string('news_main_title')->nullable();
            $table->string('blog_sub_title')->nullable();
            $table->string('blog_main_title')->nullable();
            $table->string('partner_sub_title')->nullable();
            $table->string('partner_main_title')->nullable();


            $table->string('first_main_title')->nullable();
            $table->string('first_sub_title')->nullable();
            $table->string('second_main_title')->nullable();
            $table->string('second_sub_title')->nullable();
            $table->string('third_main_title')->nullable();
            $table->string('third_sub_title')->nullable();
            $table->string('fourth_main_title')->nullable();
            $table->string('fourth_sub_title')->nullable();


            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('og_image')->nullable();

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
}

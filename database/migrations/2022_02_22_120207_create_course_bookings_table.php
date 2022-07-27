<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('course_id')->nullable();
            $table->string('course_price')->nullable();
            $table->string('course_title')->nullable();
            // $table->string('product_price')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('address')->nullable();
            // $table->string('course_id')->nullable();
            $table->longText('message')->nullable();
            $table->integer('is_read')->nullable()->default(0);
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
        Schema::dropIfExists('course_bookings');
    }
}

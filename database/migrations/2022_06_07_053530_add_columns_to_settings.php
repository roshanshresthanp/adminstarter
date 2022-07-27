<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('activity_main_title')->nullable();
            $table->string('activity_sub_title')->nullable();
            $table->string('activity_submain_title')->nullable();
            $table->string('nationality_main_title')->nullable();
            $table->string('nationality_sub_title')->nullable();
            $table->string('learner_main_title')->nullable();
            $table->string('learner_sub_title')->nullable();
            $table->string('from_title')->nullable();
            $table->string('anywhere_title')->nullable();
            $table->string('to_title')->nullable();
            $table->string('distance_learning_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {

        });
    }
}

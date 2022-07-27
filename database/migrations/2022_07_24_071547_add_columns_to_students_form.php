<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToStudentsForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_forms', function (Blueprint $table) {
            $table->string('employment_status')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('passed_year')->nullable();
            $table->string('passed_division')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_forms', function (Blueprint $table) {
            //
        });
    }
}

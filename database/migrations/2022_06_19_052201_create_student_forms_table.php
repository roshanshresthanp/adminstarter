<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_forms', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('image')->nullable();
            $table->string('applied_stream');
            $table->string('current_grade')->nullable();
            $table->string('gender')->nullable();
            $table->string('nationality')->nullable();
            $table->string('email')->nullable();
            $table->date('dob_bs')->nullable();
            $table->date('dob_ad')->nullable();
            $table->string('age')->nullable();
            $table->string('address')->nullable();
            $table->string('student_contact')->nullable();
            $table->string('type');
            $table->string('father_name')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('father_email')->nullable();
            $table->string('father_occupation')->nullable();

            $table->string('mother_name')->nullable();
            $table->string('mother_contact')->nullable();
            $table->string('mother_email')->nullable();
            $table->string('mother_occupation')->nullable();

            $table->string('local_name')->nullable();
            $table->string('local_contact')->nullable();
            $table->string('local_email')->nullable();
            $table->string('local_occupation')->nullable();

            $table->string('previous_school')->nullable();
            $table->string('previous_address')->nullable();
            $table->string('previous_gpa')->nullable();

            $table->text('message')->nullable();
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
        Schema::dropIfExists('student_forms');
    }
}

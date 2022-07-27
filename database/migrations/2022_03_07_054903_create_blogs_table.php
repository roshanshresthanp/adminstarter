<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('cover_image')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->integer('blog_category');
            $table->text('blog_type');
            $table->string('posted_by')->nullable();
            $table->integer('show_on_menu')->nullable();
            $table->longText('description')->nullable();
            $table->string('banner_image')->nullable();
            $table->boolean('publish_status')->nullable();
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
        Schema::dropIfExists('blogs');
    }
}

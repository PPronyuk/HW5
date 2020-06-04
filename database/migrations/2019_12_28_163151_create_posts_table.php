<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('owner')
                  ->nullable(false);
            $table->string('slug', 255)
                  ->unique()
                  ->nullable(false);
            $table->string('name', 100)
                  ->nullable(false);
            $table->string('preview_text', 255)
                  ->nullable(false);
            $table->longText('detail_text')
                  ->nullable(false);
            $table->boolean('published')
                  ->default(true);
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
        Schema::dropIfExists('posts');
    }
}

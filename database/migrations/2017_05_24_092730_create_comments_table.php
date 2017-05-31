<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content', 3000);
            $table->integer('postedby')->unsigned();
            $table->integer('noteid')->unsigned();
            $table->timestamps();
        });

        Schema::table('comments', function($table) {
            $table->foreign('postedby')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('noteid')->references('id')->on('notes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

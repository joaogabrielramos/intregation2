<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();
            $table->longText('text');   
            $table->string('username');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('republic_id')->nullable();
        });
        
        Schema::table('comments', function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('republic_id')->references('id')->on('republics')->onDelete('set null');
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

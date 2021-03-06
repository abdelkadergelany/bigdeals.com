<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('favorites', function (Blueprint $table) {
            //

              $table->bigIncrements('id');
            $table->timestamps();
             $table->unsignedBigInteger('userId');
             $table->unsignedBigInteger('adId');
              $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('adId')->references('id')->on('ads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('favorites', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('userId');
            $table->string('regionName');
            $table->string('cityName');
            $table->string('address');
            $table->string('subCategoryName');
             $table->string('categoryName');
            $table->string('title');
            $table->string('phone');
            $table->text('description');
            $table->unsignedDecimal('price');
            $table->integer('isUsed')->default(0);;
            $table->integer('negociable')->default(0);
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('size')->nullable();
            $table->integer('authenticity')->default(0);
            $table->string('pict1')->default("empty");
            $table->string('pict2')->default("empty");
            $table->string('pict3')->default("empty");
            $table->string('pict4')->default("empty");
            $table->string('pict5')->default("empty");
             $table->string('type');
             $table->integer('isValidate')->default(0);
              $table->integer('byNow')->default(0);
            
        
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}

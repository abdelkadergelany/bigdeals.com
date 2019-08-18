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
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
            $table->text('description');
            $table->unsignedDecimal('price');
            $table->string('isUsed')->default('0');
            $table->string('negociable')->default('0');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('size')->nullable();
            $table->string('authenticity')->default('0');
            $table->string('pict1')->nullable();
            $table->string('pict2')->nullable();
            $table->string('pict3')->nullable();
            $table->string('pict4')->nullable();
            $table->string('pict5')->nullable();
             $table->string('type')->nullable();;
             $table->string('isValidate')->default('0');
              $table->string('buyNow')->default('0');
              $table->string('isBlocked')->default('0');
              $table->string('forSale')->default('1');
            
        
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

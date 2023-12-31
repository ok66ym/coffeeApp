<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coffees', function (Blueprint $table) {
            $table->id();
            $table->double('bitter', 3, 2)->nullable();         //苦味．3桁で小数点以下2桁の少数カラム
            $table->double('acidity', 3, 2)->nullable();        //酸味．同上
            $table->double('rich', 3, 2)->nullable();           //コク．同上
            $table->double('sweet', 3, 2)->nullable();          //甘味．同上
            $table->double('smell', 3, 2)->nullable();          //香り．同上
            $table->string('roasted', 50)->nullable();          //焙煎度．50文字以内
            $table->string('name', 100);                        //珈琲豆の名前．100文字以内
            $table->string('area_name', 100)->nullable();       //産地名．100文字以内
            $table->string('species_name', 100)->nullable();    //品種名．100文字以内
            $table->string('image')->nullable();                //画像
            $table->string('shop_name', 100);                   //販売店名．100文字以内
            $table->string('shop_url', 200);                    //珈琲豆の販売サイト．100文字以内
            $table->string('official_url', 100)->nullable();    //販売店の公式URL
            $table->string('map')->nullable();                  //google map
            $table->timestamps();                               //created_at, updated_atの追加
            $table->softDeletes();                              //deleted_atの追加
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coffees');
    }
};

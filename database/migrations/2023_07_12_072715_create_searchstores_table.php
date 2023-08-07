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
        Schema::create('searchstores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');         //'user_id'は，'usersテーブル'のidを参照する外部キー．userテーブル(親テーブル)レコード削除されると関連するレコードが自動的に削除
            $table->double('bitter', 3, 2)->nullable();                             //苦味．3桁で小数点以下2桁の少数カラム
            $table->double('acidity', 3, 2)->nullable();                            //酸味．同上
            $table->double('rich', 3, 2)->nullable();                               //コク．同上
            $table->double('sweet', 3, 2)->nullable();                              //甘味．同上
            $table->double('smell', 3, 2)->nullable();                              //香り．同上
            $table->timestamps();                                                   //created_at, updated_atの追加
            $table->softDeletes();                                                  //deleted_atの追加
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('searchstores');
    }
};

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
            $table->foreignId('user_id')->constrained();    //'user_id'は，'usersテーブル'のidを参照する外部キー
            $table->text('body');                           //検索履歴．
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
        Schema::dropIfExists('searchstores');
    }
};

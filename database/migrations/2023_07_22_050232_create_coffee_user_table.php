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
        Schema::create('coffee_user', function (Blueprint $table) {
            //coffee_idとuser_idを外部キーに設定
            $table->foreignId('coffee_id')->constrained('coffees');     //参照先のテーブル名をonstrainedに記載
            $table->foreignId('user_id')->constrained('users');
            $table->primary(['coffee_id', 'user_id']);
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
        Schema::dropIfExists('coffee_user');
    }
};

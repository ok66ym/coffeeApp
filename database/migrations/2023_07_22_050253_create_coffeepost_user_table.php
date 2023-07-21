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
        Schema::create('coffeepost_user', function (Blueprint $table) {
            //coffee_idとuser_idを外部キーに設定
            $table->foreignId('coffeepost_id')->constrained('coffeeposts');   //参照先のテーブル名をonstrainedに記載
            $table->foreignId('user_id')->constrained('users');
            $table->primary(['coffeepost_id', 'user_id']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coffeepost_user');
    }
};

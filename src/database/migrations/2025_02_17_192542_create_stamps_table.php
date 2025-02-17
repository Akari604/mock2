<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stamps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->nullable();
            $table->date('stamp_date')->comment('出勤日');
            $table->time('start_work')->comment('出勤時刻')->nullable();
            $table->time('end_work')->comment('退勤時刻');
            $table->time('total_rest')->comment('休憩時間の合計');
            $table->time('total_work')->comment('勤務時間');
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
        Schema::dropIfExists('stamps');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachBlockedDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach_blocked_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coach_id')->index();
            $table->date('blocked_date')->index();
            $table->time('start_at')->nullable();
            $table->time('end_at')->nullable();

            $table->foreign('coach_id')
                ->references('id')
                ->on('coaches')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coach_blocked_dates');
    }
}

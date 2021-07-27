<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoachSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coach_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coach_id');
            $table->unsignedBigInteger('week_day_id');
            $table->time('start_at');
            $table->time('end_at');

            $table->foreign('coach_id')
                ->on('coaches')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('week_day_id')
                ->on('week_days')
                ->references('id')
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
        Schema::dropIfExists('coach_schedules');
    }
}

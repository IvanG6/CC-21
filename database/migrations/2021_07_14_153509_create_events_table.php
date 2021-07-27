<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id')->index();
            $table->unsignedBigInteger('coach_id')->index();
            $table->unsignedBigInteger('week_day_id')->index();
            $table->unsignedBigInteger('package_id')->index();
            $table->unsignedBigInteger('client_bought_package_id')->index();
            $table->smallInteger('client_timezone_id')->index();
            $table->smallInteger('status_id')->index();
            $table->date('event_date')->index();
            $table->time('start_at');
            $table->time('end_at');
            $table->softDeletes();

            $table->foreign('client_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('coach_id')
                ->references('id')
                ->on('coaches')
                ->onDelete('cascade');

            $table->foreign('week_day_id')
                ->on('week_days')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('package_id')
                ->on('packages')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('client_bought_package_id')
                ->on('clients_has_packages')
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
        Schema::dropIfExists('events');
    }
}

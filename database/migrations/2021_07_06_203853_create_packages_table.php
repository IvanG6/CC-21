<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('name');
            $table->text('description');
            $table->text('welcome_message');
            $table->unsignedInteger('count_of_sessions');
            $table->unsignedInteger('duration_of_sessions');
            $table->unsignedBigInteger('owner_id');
            $table->float('cost')->nullable();
            $table->timestamps();

            $table->foreign('owner_id')
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
        Schema::dropIfExists('packages');
    }
}

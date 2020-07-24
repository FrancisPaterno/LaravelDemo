<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room', 50)->unique();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('room_type_id');
            $table->unsignedBigInteger('room_status_id');
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('room_type_id')
            ->references('id')
            ->on('room_types')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('room_status_id')
            ->references('id')
            ->on('room_status')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('restrict')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}

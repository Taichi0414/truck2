<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucknumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucknumbers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numberplate_area');
            $table->integer('numberplate_kind');
            $table->string('numberplate_use');
            $table->integer('numberplate_number');
            $table->string('truck_kind');
            $table->integer('driver_id');
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
        Schema::dropIfExists('trucknumbers');
    }
}

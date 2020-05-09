<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaitingplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waitingplaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('place');
            $table->string('address_prefecture');
            $table->string('address_municipality');
            $table->string('address_number');
            $table->decimal('track_size_wide',4,2);
            $table->decimal('track_size_depth',4,2);
            $table->decimal('track_size_height',4,2);
            $table->decimal('track_weight',4,2);
            $table->string('img');
            $table->string('notes');
            $table->integer('company_id');
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
        
    }
}

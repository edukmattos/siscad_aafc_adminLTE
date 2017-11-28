<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');

            $table->date('date');
            $table->string('description', 50);
            $table->integer('meeting_type_id')->unsigned()->default(1);
            $table->foreign('meeting_type_id')->references('id')->on('meeting_types');
            $table->integer('city_id')->unsigned()->default(1);
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('participants_estimated_qty');
            $table->integer('participants_confirmed_qty');
            $table->float('participants_refunds_amount');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meetings');
    }
}

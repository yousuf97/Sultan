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
            $table->increments('id');
            $table->string('title',200);
            $table->text('description');
            $table->string('category',50);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('acceptable_formats',150);
            $table->text('preffered_institute');
            $table->string('age_restrictions',50);
            $table->string('accept_payment',5);
            $table->string('is_active',5);
            $table->text('file');
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
        Schema::dropIfExists('events');
    }
}

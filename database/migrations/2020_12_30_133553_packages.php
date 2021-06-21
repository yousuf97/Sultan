<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Packages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->mediumText('description');
            $table->integer('test_group_id');
            $table->float('actual_price', 8, 2);
            $table->float('discount_price', 8, 2);
            $table->string('file');
            $table->integer('is_active');
            $table->integer('created_by');
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
        Schema::dropIfExists('packages');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',200);
            $table->string('description',500);
            $table->string('category',150);
            $table->string('address',500);
            $table->string('email',50);
            $table->string('phone',30);
            $table->string('is_active',10);
            $table->string('land_line',30);
            $table->string('country',30);
            $table->string('web_url',200);
            $table->string('social_url',200);
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
        Schema::dropIfExists('institutions');
    }
}

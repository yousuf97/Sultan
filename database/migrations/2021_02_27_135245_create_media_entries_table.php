<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_entries', function (Blueprint $table) {
             $table->increments('id');
             $table->string('title',200);
             $table->text('description');
             $table->string('category',200);
             $table->text('tags');
             $table->string('play_list',100);
             $table->string('visibility',20);
             $table->string('media_thumbnail',500);
             $table->string('media_file_id',30); 
             $table->string('status',30);
             $table->text('status_comment');             
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
        Schema::dropIfExists('media_entries');
    }
}

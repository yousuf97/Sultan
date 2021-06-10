<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaReportedIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_reported_issues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('media_id');
            $table->integer('user_id');
            $table->text('issue');
            $table->enum('status', ['reported', 'reviewed', 'closed']);
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
        Schema::dropIfExists('media_reported_issues');
    }
}

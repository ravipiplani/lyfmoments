<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMomentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('feel_id');
            $table->text('message');
            $table->timestamp('share_at')->nullable();
            $table->unsignedBigInteger('share_with')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->timestamps();
        });

        Schema::create('moment_status', function (Blueprint $table) {
            $table->unsignedBigInteger('moment_id');
            $table->unsignedBigInteger('status_id');
            $table->timestamp('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moments');
    }
}

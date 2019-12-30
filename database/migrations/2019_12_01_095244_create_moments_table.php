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
            $table->unsignedBigInteger('feel_id')->nullable();
            $table->text('message')->nullable();
            $table->timestamp('share_at')->nullable();
            $table->text('share_with')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_scheduled')->default(false);
            $table->boolean('is_expired')->default(false);
            $table->double('amount')->nullable();
            $table->string('razorpay_order_id')->nullable();
            $table->string('link')->unique()->nullable();
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
        Schema::dropIfExists('moment_status');
    }
}

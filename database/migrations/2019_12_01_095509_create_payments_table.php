<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('moment_id');
            $table->string('razorpay_payment_id');
            $table->string('entity');
            $table->float('amount');
            $table->string('currency');
            $table->string('status');
            $table->string('method');
            $table->string('desc')->nullable();
            $table->boolean('international');
            $table->string('refund_status')->nullable();
            $table->integer('amount_refunded')->nullable();
            $table->boolean('captured')->default(false);
            $table->string('email');
            $table->string('contact');
            $table->integer('fee');
            $table->integer('tax');
            $table->string('error_code')->nullable();
            $table->string('error_desc')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('payments');
    }
}

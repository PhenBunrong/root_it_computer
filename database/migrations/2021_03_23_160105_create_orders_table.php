<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('tracking_no');
            $table->string('tracking_msg')->nullable();
            $table->string('payment_mode');
            $table->string('payment_id')->nullable();
            $table->string('payment_status')->default('0')->comment('0=codpending , 1=codpaid, 2=razorpaysuccess, 3=razorpayfialed, 4=stripesuccess, 5=ripefailed');
            $table->string('order_status')->default('0')->comment('0=pending, 1=completed, 2=cancelled');
            $table->string('cancel_reason')->nullable();
            $table->string('notity')->default('0');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**         / $table->string('total');
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

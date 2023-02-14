<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallbackDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('callback_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('totalAmount');
            $table->string('transactionStatus');
            $table->string('methodName');
            $table->string('merchantOrderId');
            $table->string('transactionId');
            $table->string('customerName');
            $table->string('providerName');
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
        Schema::dropIfExists('callback_data');
    }
}

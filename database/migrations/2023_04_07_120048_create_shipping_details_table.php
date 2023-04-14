<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_details', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->foreignId('order_nmr')->references('order_number')->on('orders');
            $table->string('streetname');
            $table->string('housenmr');
            $table->string('housenmr_extra')->nullable();
            $table->string('postalcode');
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
        Schema::dropIfExists('shipping_details');
    }
};

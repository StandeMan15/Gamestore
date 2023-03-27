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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
<<<<<<< Updated upstream
            $table->foreignId('user_id');
            $table->foreignId('status_id');
            $table->foreignId('user_order');
            $table->foreignId('product_id');
            $table->string('quantity');
=======
            $table->foreignId('user_id')->constrained();

            $table->string('order_id');
>>>>>>> Stashed changes
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
        Schema::dropIfExists('orders');
    }
};

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
            $table->bigInteger('affiliate_id')->unsigned();
            $table->string('phone');
            $table->string('full_name');
            $table->string('governrate');
            $table->string('city');
            $table->string('address');
            $table->double('total_price', 8,2)->nullable();
            $table->decimal('commission', 8, 2)->nullable();
            $table->string('status');
            $table->boolean('active')->default(true);
            $table->string('reason_refused')->nullable();
            $table->foreign('affiliate_id')->references('id')->on('users')->onDelete('cascade');
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
}

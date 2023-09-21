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
            $table->unsignedBigInteger('customer_address_id')->nullable();
            $table->foreign('customer_address_id')
                ->references('id')
                ->on('customer_addresses')
                ->onDelete('cascade');
            $table->enum('order_status', ['Menunggu Bayar', 'Proses', 'Dikirim', 'Selesai'])->default('Menunggu Bayar')->nullable();
            $table->integer('total_price')->nullable();
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

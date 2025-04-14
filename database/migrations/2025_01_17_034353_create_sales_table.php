<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('saleID');
            $table->date('sale_date');
            $table->decimal('total_amount', 10, 2);
            $table->unsignedBigInteger('customerID')->nullable();
            $table->string('cashier_name');
            $table->decimal('paid_amount', 10, 2)->nullable();
            $table->decimal('change', 10, 2)->nullable();
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
        Schema::dropIfExists('sales');
    }
}

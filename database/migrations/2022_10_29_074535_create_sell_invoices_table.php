<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invioce_number')->nullable();
            $table->string('voucher_number')->nullable();
            $table->string('total_gross')->nullable();
            $table->string('pvs')->nullable();
            $table->string('gate_pass_number')->nullable();
            $table->longText('place_details')->nullable();
            $table->date('date');
            $table->string('note');
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
        Schema::dropIfExists('sell_invoices');
    }
}

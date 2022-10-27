<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialInfoToMakeProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_info_to_make_products', function (Blueprint $table) {
            $table->id();
            $table->integer('material_id');
            $table->integer('product_id');
            $table->string('unit_amount')->nullable();
            $table->string('price')->nullable();
            $table->string('total_price')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('material_info_to_make_products');
    }
}

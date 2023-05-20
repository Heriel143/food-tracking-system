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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_no');
            $table->integer('product_id');
            $table->date('date');
            $table->string('description')->nullable();
            $table->double('unit_price');
            $table->double('buying_qty');
            $table->double('buying_price');
            $table->integer('supplier_id');
            $table->integer('category_id');
            $table->tinyInteger('status')->default('0')->comment('0=Pending, 1=Approved');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('purchases');
    }
};

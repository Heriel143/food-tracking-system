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
            $table->integer('purchase_no');

            $table->foreignId('product_id')->constrained();
            $table->date('date');
            $table->string('description')->nullable();
            $table->double('unit_price');
            $table->double('buying_qty');
            $table->double('buying_price');

            $table->foreignId('supplier_id')->constrained();
            // $table->foreignId('category_id')->constrained();
            $table->foreignId('region_id')->constrained();
            $table->tinyInteger('status')->default('0')->comment('0=Pending, 1=Inprogress, 2=Received');
            $table->tinyInteger('received')->default('0')->comment('0=Not_Received, 1=Received');
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

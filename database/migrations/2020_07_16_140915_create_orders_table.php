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
            $table->bigIncrements('id');
            $table->string('design_name')->nullable();
            $table->string('po_no')->nullable();
            $table->string('height', 20)->nullable();
            $table->string('weight', 20)->nullable();
            $table->string('number_of_colors')->nullable();
            $table->string('fabric')->nullable();
            $table->string('placement')->nullable();
            $table->string('required_format')->nullable();
            $table->string('is_urgent')->nullable();
            $table->string('instructions')->nullable();
            $table->string('color_type')->nullable();
            $table->boolean('status')->default(false);
            $table->tinyInteger('type')->comment('type of order, Vector or Digitizing');
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

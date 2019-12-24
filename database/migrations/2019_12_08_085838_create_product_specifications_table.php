<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSpecificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_specifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->string('dimensions', 255)->nullable();
            $table->string('printing', 255)->nullable();
            $table->string('paper_stock', 255)->nullable();
            $table->string('quantities', 255)->nullable();
            $table->string('coating', 255)->nullable();
            $table->string('default_process', 255)->nullable();
            $table->string('options', 255)->nullable();
            $table->string('proof', 255)->nullable();
            $table->string('turn_around_time', 255)->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('product_specifications');
    }
}

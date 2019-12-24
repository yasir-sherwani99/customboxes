<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->tinyInteger('box_type_id')->nullable();
            $table->string('stock')->nullable();
            $table->decimal('width', 8,2)->nullable();
            $table->decimal('height', 8,2)->nullable();
            $table->decimal('length', 8,2)->nullable();
            $table->string('units')->nullable();
            $table->string('colors')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('quotes');
    }
}

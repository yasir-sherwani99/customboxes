<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeoColsInProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('main_description')->after('description')->nullable();
            $table->string('page_title')->after('units_in_stock')->nullable();
            $table->string('page_description', 255)->after('page_title')->nullable();
            $table->string('page_keywords')->after('page_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['main_description','page_title','page_description','page_keywords']);
        });
    }
}

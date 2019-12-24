<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoColsInProductImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_images', function (Blueprint $table) {
            $table->string('image_name')->after('product_id')->nullable();
            $table->string('dimensions')->after('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_images', function (Blueprint $table) {
            $table->dropColumn(['image_name','dimensions']);
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColsInGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('generals', function (Blueprint $table) {
            $table->string('home_page_heading', 255)->after('page_keywords')->nullable();
            $table->string('home_page_sub_heading', 255)->after('home_page_heading')->nullable();
            $table->string('home_page_description', 500)->after('home_page_sub_heading')->nullable();
            $table->string('home_page_banner_1')->after('home_page_description')->nullable();
            $table->string('home_page_banner_2')->after('home_page_banner_1')->nullable();
            $table->string('home_page_banner_3')->after('home_page_banner_2')->nullable();
            $table->string('home_page_banner_4')->after('home_page_banner_3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('generals', function (Blueprint $table) {
            $table->dropColumn(['home_page_heading','home_page_sub_heading','home_page_description','home_page_banner_1','home_page_banner_2','home_page_banner_3','home_page_banner_4']);
        });
    }
}

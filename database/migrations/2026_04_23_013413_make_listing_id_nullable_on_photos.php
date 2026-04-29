<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeListingIdNullableOnPhotos extends Migration
{
    public function up()
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->integer('listing_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('photos', function (Blueprint $table) {
            $table->integer('listing_id')->nullable(false)->change();
        });
    }
}
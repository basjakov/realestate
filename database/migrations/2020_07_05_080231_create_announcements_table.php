<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('estate_desc');
            $table->string('estate_type');
            $table->string('location')->nullable();
            $table->string('address');
            $table->string('building')->nullable();
            $table->string('apt')->nullable();
            $table->string('cascade_code')->nullable();
            $table->string('cascade_code2')->nullable();
            $table->integer('price');
            $table->integer('price_sqm');
            $table->string('currency')->nullable();

            $table->integer('floor')->nullable();
            $table->integer('storey');
            $table->integer('square_meter');
            $table->integer('land_area');
            //comercion
            $table->string('position')->nullable();
            $table->string('Significance')->nullable();

            $table->integer('rooms');
            $table->integer('toilets');
            $table->string('typeofbld');

            $table->boolean('new_building')->nullable();
            $table->integer('celling_height');
            $table->string('condition');
            $table->string('comunal');
            $table->string('additional');

            $table->string('videourl')->nullable();
            $table->string('map')->nullable();
            $table->longText('desc_arm')->nullable();
            $table->longText('desc_eng')->nullable();
            $table->longText('desc_rus')->nullable();

            $table->longText('other')->nullable();
            $table->boolean('published')->nullable();
            //partnership
            $table->boolean('ready_prt')->nullable();
            $table->string('agent');
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
        Schema::dropIfExists('announcements');
    }
}

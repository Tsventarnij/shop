<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class MediaType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_type', function (Blueprint $table) {
            $table->unsignedSmallInteger('id', true);
            $table->string('name');
            $table->timestamps();
        });

        Artisan::call('db:seed', array('--class' => 'MediaType'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_type');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectorContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sector_contact', function (Blueprint $table) {
            $table->id();
            $table->string('contact');
            $table->bigInteger('sector_id')->unsigned();
            $table->bigInteger('contact_type_id')->unsigned();
            $table->foreign('sector_id')->references('id')->on('sectors');
            $table->foreign('contact_type_id')->references('id')->on('contact_type');
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
        Schema::dropIfExists('sector_contact');
    }
}

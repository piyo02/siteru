<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachment_letters', function (Blueprint $table) {
            $table->id();
            $table->string('attachment'); # image file
            $table->bigInteger('letter_id')->unsigned();
            $table->foreign('letter_id')->references('id')->on('violation_letters');
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
        Schema::dropIfExists('attachment_letters');
    }
}

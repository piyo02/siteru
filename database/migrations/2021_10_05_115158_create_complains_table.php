<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('complains', function (Blueprint $table) {
        //     $table->id();
        //     $table->text('complain');
        //     $table->string('identity');
        //     $table->string('name');
        //     $table->bigInteger('sector_id')->unsigned();
        //     $table->foreign('sector_id')->references('id')->on('sectors');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complains');
    }
}

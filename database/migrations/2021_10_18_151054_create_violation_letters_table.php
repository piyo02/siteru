<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolationLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violation_letters', function (Blueprint $table) {
            $table->id();
            $table->string('number');           // nomor surat
            $table->string('regarding');        // perihal: teguran/panggilan atau teguran/panggilan pertama
            $table->integer('warn');            // teguran ke-
            $table->string('offender');         // nama pelanggar
            $table->string('type');             // jenis pelanggaran
            $table->string('signature')->nullable();// tanda tangan pelanggar
            $table->string('districts');        // kecamatan
            $table->string('village');          // kelurahan
            $table->string('street');           // jalan
            $table->string('team');             // Tim pelaksana
            $table->string('activity');         // kegiatan pembangunan
            $table->text('violations');         // pelanggaran
            $table->string('name');             // nama kepala dinas PU
            $table->string('employee_number');  // nip kepala dinas PU
            $table->string('long');             // long
            $table->string('lat');              // lat
            $table->bigInteger('created_by')->unsigned(); // dibuat oleh
            $table->foreign('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('violation_letters');
    }
}
// lampiran         (foto)              -> attachment_letters
// pelanggaran      (daftar pelanggaran)-> violations

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkisakaatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekisakaates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description');
            $table->string('theme');
            $table->string('translation_version1');
            $table->string('translation_version2');
            $table->string('venue');
            $table->boolean('open');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('activeyear_id');
            $table->timestamps();
            $table->foreign('activeyear_id')->references('id')->on('activeyears')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ekisakaates');
    }
}

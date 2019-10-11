<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('gender');
            $table->integer('age');
            $table->string('class');
            $table->string('school');
            $table->string('residence');
            $table->string('religion');
            $table->string('image_name')->nullable();
            $table->string('health_notes');
            $table->string('first_time');
            $table->string('years')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_contact')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_tel');
            $table->string('emergency_contact_relationship');
            $table->string('specialNotes');
            $table->string('response');
            $table->boolean('luganda_classes');
            $table->boolean('conscent');
            $table->date('conscent_date');
            $table->boolean('agree');
            $table->date('agree_date');
            $table->unsignedBigInteger('ekn_id');
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
        Schema::dropIfExists('participants');
    }
}

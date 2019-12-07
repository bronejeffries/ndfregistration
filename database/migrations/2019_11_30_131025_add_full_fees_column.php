<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFullFeesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('participants', function (Blueprint $table) {
            //

            $table->integer("participation_fees_paid")->nullable(false)->default(0);
            $table->integer("registration_fees")->nullable(false)->default(0);
            $table->boolean("isCleared")->nullable(false)->default(0);
            $table->boolean("pending_payment")->nullable(false)->default(0);
            $table->integer("amount_to_confirm")->nullable(true);

        });

        Schema::table('ekisakaates', function (Blueprint $table) {
            //
            $table->integer("participation_fees")->nullable(false)->default(0);
            $table->integer("confirmed_participants")->nullable(false)->default(0);

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            //

            $table->dropColumn("participation_fees_paid");
            $table->dropColumn('registration_fees');
            $table->dropColumn("isCleared");
            $table->dropColumn("pending_payment");
            $table->dropColumn("amount_to_confirm");

        });

        Schema::table('ekisakaates', function (Blueprint $table) {
            //
            $table->dropColumn("participation_fees");
            $table->dropColumn("confirmed_participants");

        });

    }

}

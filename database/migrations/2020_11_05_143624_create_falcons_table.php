<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFalconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('falcons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('P_REQUEST_TYP')->nullable();
            $table->string('P_O_CIVIL_ID')->nullable();
            $table->string('P_O_A_NAME')->nullable();
            $table->string('P_O_ADDRESS')->nullable();
            $table->string('P_O_MOBILE')->nullable();
            $table->string('P_O_PASSPORT_NO')->nullable();
            $table->string('P_CIVIL_EXPIRY_DT')->nullable();
            $table->string('P_O_MAIL')->nullable();
            $table->string('P_NW_CIVIL_ID')->nullable();
            $table->string('P_NW_A_NAME')->nullable();
            $table->string('P_NW_ADDRESS')->nullable();
            $table->string('P_NW_MOBILE')->nullable();
            $table->string('P_NW_PASSPORT_NO')->nullable();
            $table->string('P_NW_CIVIL_EXPIRY')->nullable();

            $table->string('P_NW_O_MAIL')->nullable();
            $table->string('P_CUR_PASS_FAL')->nullable();
            $table->string('P_FAL_SEX')->nullable();

            $table->string('P_FAL_SPECIES')->nullable();
            $table->string('P_FAL_TYPE')->nullable();
            $table->string('P_FAL_OTHER_TYPE')->nullable();
            $table->string('P_FAL_ORIGIN_COUNTRY')->nullable();

            $table->string('P_FAL_CITES_NO')->nullable();
            $table->string('P_FAL_PIT_NO')->nullable();
            $table->string('P_FAL_RING_NO')->nullable();
            $table->string('P_FAL_INJ_DATE')->nullable();

            $table->string('P_FAL_INJ_HOSPITAL')->nullable();
            $table->string('P_PAYMENT_ID')->nullable();
            $table->string('P_AMOUNT')->nullable();
            $table->string('P_TRANS_ID')->nullable();
            $table->string('P_TRACK_ID')->nullable();
            $table->string('P_OUT_REQUEST_NO')->nullable();
            $table->string('P_STATUS_MSG')->nullable();

            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('falcons');
    }
}

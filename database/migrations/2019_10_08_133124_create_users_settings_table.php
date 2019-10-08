<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_settings', function (Blueprint $table) {
            $table->bigIncrements('us_id');
            $table->unsignedBigInteger('us_user_id')->nullable();
            $table->foreign('us_user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('us_profil_id')->nullable();
            $table->foreign('us_profil_id')->references('up_id')->on('users_profils')->onDelete('set null');
            $table->timestamp('us_created_at')->nullable();
            $table->timestamp('us_updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_settings');
    }
}

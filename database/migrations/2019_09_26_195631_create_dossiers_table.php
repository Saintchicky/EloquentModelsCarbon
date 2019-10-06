<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->bigIncrements('d_id');
            $table->string('d_nom');
            $table->string('d_prenom');
            $table->unsignedBigInteger('d_agence_id')->nullable();
            $table->foreign('d_agence_id')->references('ag_id')->on('agences')->onDelete('set null');
            $table->timestamp('d_created_at')->nullable();
            $table->timestamp('d_updated_at')->nullable();
            $table->date('d_date_deb')->nullable();
            $table->text('d_date_fin')->nullable();
            $table->text('d_serialize')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dossiers');
    }
}

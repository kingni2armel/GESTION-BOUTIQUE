<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('boutique_id');
            $table->foreign('boutique_id')->references('id')->on('boutiques')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('mois_id');
            $table->foreign('mois_id')->references('id')->on('mois')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->integer('prixp');
            $table->date('date');
            

            
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
        Schema::dropIfExists('paiements');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destinateur_id');
            $table->foreign('destinateur_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->unsignedBigInteger('destinataire_id');
            $table->foreign('destinataire_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->text('message');
            $table->date('date_envoie');
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
        Schema::dropIfExists('messages');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained();
            $table->bigInteger('numero_de_TVA');
            $table->string('nom_de_entreprise');
            $table->string('activite_d_entreprise');
            $table->string('email');
            $table->string('adresse');
            $table->string('ville');
            $table->string('pays');
            $table->string('numero_fixe');
            $table->string('code_postal');
            $table->string('email_de_la_personne_de_contact');
            $table->string('nom_de_la_personne_de_contact');
            $table->string('numero_de_la_personne_de_contact');

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
        Schema::dropIfExists('entreprises');
    }
}

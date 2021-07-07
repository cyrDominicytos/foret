<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatVersementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etat_versements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero')->unique();
            $table->unsignedBigInteger('id_procedure_exportation');
            $table->string('numero_quittance')->nullable();
            $table->date('date_quittance')->nullable();
            $table->string('quittance_delivre_a')->nullable();
            $table->string('nom_commissaire_agree')->nullable();
            $table->string('contact_commissaire_agree')->nullable();
            $table->double('montant_total');
            $table->unsignedBigInteger('id_agent_traitant');
            $table->text('observation')->nullable();
            $table->timestamp('date_versement')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('date_reglement');
            $table->timestamps();
           
           
            $table->foreign('id_procedure_exportation')
                ->references('id')
                ->on('procedure_exportations')
                ->onDelete('cascade');

            $table->foreign('id_agent_traitant')
                ->references('id')
                ->on('forestiers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etat_versements');
    }
}

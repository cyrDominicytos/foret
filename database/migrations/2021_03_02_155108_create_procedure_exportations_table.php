<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedureExportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('procedure_exportations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero')->unique();
            $table->unsignedBigInteger('id_demande_annuelle');
            $table->unsignedBigInteger('id_usager');
            $table->unsignedBigInteger('id_pays_destination');

            $table->unsignedBigInteger('id_statut');

            $table->string('reference_conteneur');
            $table->string('reference_plomb');
            $table->string('reference_transporteur');
            $table->string('nom_conducteur');
            $table->string('telephone_conducteur');

            $table->unsignedBigInteger('departement_empotage');
            $table->unsignedBigInteger('commune_empotage');
            $table->string('localite_empotage');

            $table->unsignedBigInteger('departement_provenance');
            $table->unsignedBigInteger('commune_provenance');

            $table->unsignedBigInteger('id_poste_forestier');
            $table->string('reference_document_provenance');
           
            $table->double('volume_total');
            $table->text('observation')->nullable();
            $table->date('date_depart');
            $table->timestamps();
            

            $table->foreign('id_demande_annuelle')
                ->references('id')
                ->on('demande_annuelles')
                ->onDelete('cascade');

            $table->foreign('id_usager')
                ->references('id')
                ->on('usagers')
                ->onDelete('cascade');

            $table->foreign('id_pays_destination')
                ->references('id')
                ->on(prefixe_table().'pays')
                ->onDelete('cascade');

            $table->foreign('id_statut')
                ->references('id')
                ->on('statut_procedure_exportations')
                ->onDelete('cascade');

            $table->foreign('commune_empotage')
                ->references('id')
                ->on('communes')
                ->onDelete('cascade');

            $table->foreign('departement_empotage')
                ->references('id')
                ->on('departements')
                ->onDelete('cascade');


            $table->foreign('commune_provenance')
                ->references('id')
                ->on('communes')
                ->onDelete('cascade');

            $table->foreign('departement_provenance')
                ->references('id')
                ->on('departements')
                ->onDelete('cascade');

            $table->foreign('id_poste_forestier')
                ->references('id')
                ->on('postes')
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
        Schema::dropIfExists('procedure_exportations');
    }
}

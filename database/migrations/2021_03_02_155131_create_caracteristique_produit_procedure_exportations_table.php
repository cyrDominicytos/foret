<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristiqueProduitProcedureExportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristique_produit_procedure_exportations', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_procedure_exportation');
            $table->unsignedBigInteger('id_espece_produit');
            $table->unsignedBigInteger('id_type_produit');
             $table->string('type_exploitation')->default("Exportation de produits forestiers");
            $table->string('nature_recette')->default("Etat de versement des recettes forestieres");
            
            $table->double('epaisseur')->nullable();
            $table->double('largeur')->nullable();
            $table->double('longueur')->nullable();
            
            $table->double('volume');
            $table->timestamps();
           
            $table->foreign('id_procedure_exportation')
                ->name('fk_id_procedure_exportation')
                ->references('id')
                ->on('procedure_exportations')
                ->onDelete('cascade');

            $table->foreign('id_espece_produit')
                ->name('fk_commune_transformationid_espece_produit')
                ->references('id')
                ->on('espece_produits')
                ->onDelete('cascade');

            $table->foreign('id_type_produit')
                ->name('fk_id_type_produit')
                ->references('id')
                ->on('type_produits')
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
        Schema::dropIfExists('caracteristique_produit_procedure_exportations');
    }
}

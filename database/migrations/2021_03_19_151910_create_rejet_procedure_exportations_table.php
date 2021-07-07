<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRejetProcedureExportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejet_procedure_exportations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_procedure_exportation');
            $table->unsignedBigInteger('id_statut_avant_rejet');
            $table->unsignedBigInteger('id_statut_apres_rejet');
            $table->unsignedBigInteger('id_agent_traitant');

            $table->text('raison_rejet');
            $table->timestamp('date_rejet')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            
            $table->foreign('id_procedure_exportation')
                ->references('id')
                ->on('procedure_exportations')
                ->onDelete('cascade'); 

            $table->foreign('id_statut_avant_rejet')
                ->references('id')
                ->on('statut_procedure_exportations')
                ->onDelete('cascade');

            $table->foreign('id_statut_apres_rejet')
                ->references('id')
                ->on('statut_procedure_exportations')
                ->onDelete('cascade');

            $table->foreign('id_agent_traitant')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('rejet_procedure_exportations');
    }
}

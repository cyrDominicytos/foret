<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstatConformitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constat_conformites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero')->unique();
            $table->unsignedBigInteger('id_procedure_exportation');
            $table->integer('conformite_contenu_procedure_exportation');
            $table->integer('conformite_reglementation');

            $table->unsignedBigInteger('id_agent_traitant');
            $table->text('observation')->nullable();
            $table->timestamp('date_constat')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('constat_conformites');
    }
}

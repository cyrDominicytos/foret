<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvisTechniquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avis_techniques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero')->unique();
            $table->unsignedBigInteger('id_procedure_exportation');
            $table->date('debut_validite');
            $table->date('fin_validite');
            $table->date('fin_validite_etendue');
            $table->unsignedBigInteger('id_agent_emission');
            $table->unsignedBigInteger('id_agent_extension')->nullable();
            $table->text('observation')->nullable();
            $table->timestamp('date_avis_technique')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
           
           
            $table->foreign('id_procedure_exportation')
                ->references('id')
                ->on('procedure_exportations')
                ->onDelete('cascade');

            $table->foreign('id_agent_emission')
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
        Schema::dropIfExists('avis_techniques');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContreConstatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contre_constats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero')->unique();
            $table->unsignedBigInteger('id_procedure_exportation');
            $table->integer('conformite_au_constat_conformite');


            $table->unsignedBigInteger('id_agent_traitant');
            $table->text('observation')->nullable();
            $table->timestamp('date_contre_constat')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('contre_constats');
    }
}

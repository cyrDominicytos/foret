<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiquidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidations', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->unsignedBigInteger('id_procedure_exportation');
            $table->unsignedBigInteger('autorite');
            $table->text('observation')->nullable();
            $table->timestamp('date_liquidation')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            

            $table->foreign('autorite')
                ->references('id')
                ->on('intervenants')
                ->onDelete('cascade');

            $table->foreign('id_procedure_exportation')
                ->references('id')
                ->on('procedure_exportations')
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
        Schema::dropIfExists('liquidations');
    }
}

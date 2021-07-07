<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBfusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bfus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_procedure_exportation');
            $table->unsignedBigInteger('autorite');
            $table->text('observation')->nullable();
            $table->timestamp('date_bfu')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('date_reglement')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('bfus');
    }
}

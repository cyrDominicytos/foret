<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostesPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postes_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_poste_parent');
            $table->unsignedBigInteger('id_poste_fils');
            $table->timestamps();
            
            $table->foreign('id_poste_parent')
                ->references('id')
                ->on('postes')
                ->onDelete('cascade');
            $table->foreign('id_poste_fils')
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
        Schema::dropIfExists('postes_pivot');
    }
}

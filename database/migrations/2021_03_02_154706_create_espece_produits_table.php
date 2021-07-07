<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspeceProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('espece_produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designation');
            $table->text('observation')->nullable();
            $table->integer('statut')->default(1);
            $table->double('prix_unitaire')->default(0);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('espece_produits');
    }
}

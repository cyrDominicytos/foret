<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('postes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->unsignedBigInteger('id_commune');
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
            $table->integer('type')->comment('Voir la table types_postes');
            $table->text('observation')->nullable();
            $table->integer('statut')->default(1)->comment('1=Activé, 2=désactivé');
            $table->timestamps();


            $table->foreign('id_commune')
                ->references('id')
                ->on('communes')
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
        Schema::dropIfExists('postes');
    }
}

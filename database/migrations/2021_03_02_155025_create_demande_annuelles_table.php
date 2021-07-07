<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeAnnuellesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('demande_annuelles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('numero')->unique();
            $table->unsignedBigInteger('id_usager');
            $table->text('autre_information')->nullable();
            $table->integer('demande_pour_annee');
            $table->timestamp('date_creation')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamps();
            

            $table->foreign('id_usager')
                ->references('id')
                ->on('usagers')
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
        Schema::dropIfExists('demande_annuelles');
    }
}

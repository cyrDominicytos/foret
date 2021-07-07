<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForestiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forestiers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_poste');
            $table->string('titre');
            $table->string('grade');
            $table->timestamps();
            
            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            
            $table->foreign('id_poste')
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
        Schema::dropIfExists('forestiers');
    }
}

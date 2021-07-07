<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(prefixe_table().'pays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->string('titre_en')->nullable();
            $table->string('code')->unique();
            $table->integer('indicatif')->nullable();
            $table->boolean('actif')->default(1);
            
            $table->timestamps();
            $table->uuid('uuid')->nullable()->unique(); //nullable parce que la migration est impossible
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(prefixe_table().'pays');
    }
}

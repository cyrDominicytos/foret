<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(prefixe_table().'etats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titre');
            $table->unsignedBigInteger('pay_id');
            $table->boolean('actif')->default(1);
            $table->timestamps();

            $table->uuid('uuid')->nullable()->unique(); //nullable parce que la migration est impossible
            
            $table->foreign('pay_id')->references('id')->on(prefixe_table().'pays')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(prefixe_table().'etats');
    }
}

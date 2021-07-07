<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('autorite');
            $table->string('entite_vise');
            $table->integer('entite_id');
            $table->text('observation')->nullable();
            $table->timestamp('date_visa')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
            

            $table->foreign('autorite')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('visas');
    }
}

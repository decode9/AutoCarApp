<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcessionairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concessionaires', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('direction');
            $table->string('code')->unique();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->timestamps();

            $table->foreign('region_id')->references('id')->on('regions')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concessionaires');
    }
}

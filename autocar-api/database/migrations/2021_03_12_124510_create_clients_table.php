<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('id_number')->unique();
            $table->string('name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->unsignedBigInteger('concessionaire_id')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('concessionaire_id')->references('id')->on('concessionaires')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->enum('state',['0','1','2'])->default('0');
            $table->enum('mp',['0','1'])->default('0');
            $table->longText('descripcion')->nullable();
            $table->string('capacidad');
            $table->string('ubicacion')->nullable();
            $table->string('latitude')->unique();
            $table->string('longitude')->unique();
            $table->string('locality');
            $table->string('subAdministrativeArea');
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
        Schema::dropIfExists('offices');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{

    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->string('name');
            $table->string('dni')->nullable()->unique();;
            $table->string('ruc')->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('phone')->unique();
            $table->string('email')->nullable()->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}

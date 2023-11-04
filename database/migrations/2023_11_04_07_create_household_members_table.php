<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::create('household_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('household_id');
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->string('vaccination_status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('household_members');
    }
};

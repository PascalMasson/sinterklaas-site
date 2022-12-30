<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('cadeaus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->enum('status', ['VRIJ', 'GEKOCHT', 'GERESERVEERD'])->default('VRIJ');
            $table->float('prijs')->nullable();
            $table->longText('location')->nullable();
//            $table->unsignedBigInteger('createdBy');
//            $table->unsignedBigInteger('listId');
//            $table->unsignedBigInteger('reservedBy')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cadeaus');
    }
};

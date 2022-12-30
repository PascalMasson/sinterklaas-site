<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cadeaus', function (Blueprint $table) {
            $table->foreignId('createdBy')->constrained('users');
            $table->foreignId('listId')->constrained('users');
            $table->foreignId('reservedBy')->nullable()->constrained('users');
        });

        Schema::table('attachments', function (Blueprint $table) {
            $table->foreignId('uploadedBy')->constrained('users');
            $table->foreignId('cadeauId')->constrained('cadeaus');
        });

        Schema::table('foppers', function (Blueprint $table) {
            $table->foreignId('fopperVan')->constrained('users');
            $table->foreignId('fopperVoor')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

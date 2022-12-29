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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('partnerId')->nullable();
            $table->boolean('kind')->nullable();
        });

        $users = [
            ["Thiemo", 2, 0],
            ["Marianne", 1, 0],
            ["Jurrie", 4, 0],
            ["Ettie", 3, 0],
            ["Peter", 6, 0],
            ["Esther", 5, 0],
            ["Pascal", 0, 0],
            ["Rogier", 0, 0],
            ["Pepijn", 0, 1],
            ["Jasper", 0, 1],
            ["Matthijs", 0, 1],
        ];
        foreach ($users as $user) {
            DB::insert('insert into users (name, partnerId, kind) values (?, ?, ?)', $user);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

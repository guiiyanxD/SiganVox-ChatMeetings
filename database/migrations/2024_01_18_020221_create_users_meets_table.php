<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_meets', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('user_id');
            $table->UnsignedBigInteger('meet_id');
            $table->UnsignedBigInteger('participation_type_id');
            $table->integer('entries_qty')->default(1);
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('meet_id')->on('meets')->references('id');
            $table->foreign('participation_type_id')->on('participation_types')->references('id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_meets');
    }
};

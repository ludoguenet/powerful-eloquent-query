<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            $table->string('team_one');
            $table->string('team_two');

            $table->foreignId('stadium_id')
                ->index()
                ->nullable()
                ->constrained();

            $table->foreignId('city_id')
                ->index()
                ->constrained();

            $table->foreignId('schedule_id')
                ->index()
                ->nullable()
                ->constrained();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};

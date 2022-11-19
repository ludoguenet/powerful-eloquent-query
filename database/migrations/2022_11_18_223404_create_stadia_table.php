<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('stadia', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('spectators');
            $table->unsignedInteger('square_metre');

            $table->boolean('doors_closed');

            $table->foreignId('user_id')
                ->index()
                ->constrained();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stadia');
    }
};

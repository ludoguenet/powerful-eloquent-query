<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('action_user', function (Blueprint $table) {
            $table->foreignId('action_id')
                ->index()
                ->constrained();

            $table->foreignId('user_id')
                ->index()
                ->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('action_user');
    }
};

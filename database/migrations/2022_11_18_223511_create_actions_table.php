<?php

declare(strict_types=1);

use App\Enums\EnumActions;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->id();

            $table->enum('name', array_column(EnumActions::cases(), 'value'));

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('actions');
    }
};

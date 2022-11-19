<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\EnumActions;
use App\Models\Action;
use App\Models\Game;
use App\Models\Schedule;
use App\Models\Stadium;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schedule::factory()
            ->count(25)
            ->create();

        Stadium::factory()
            ->count(25)
            ->create();

        Game::factory()
            ->count(100)
            ->create()
            ->each(static function (Game $game) {
                $game->stadium()->associate(Stadium::query()->inRandomOrder()->first());
                $game->schedule()->associate(Schedule::query()->inRandomOrder()->first());

                $game->save();
            });

        foreach (EnumActions::cases() as $enumName) {
            Action::create([
                'name' => $enumName
            ]);
        }

        foreach (User::all() as $user) {
            $user
                ->actions()
                ->attach(
                    Action::query()
                        ->inRandomOrder()
                        ->take(1)
                        ->firstOrFail()
                        ->id,
                );
        }
    }
}

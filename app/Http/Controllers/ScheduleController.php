<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\EnumActions;
use App\Models\City;
use App\Models\Game;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __invoke()
    {
        $schedules = Schedule::query()
            ->with([
                'games',
                'games.stadium'
            ])
            ->where('user_id', 1)
            ->withWhereHas('games', function ($query) {
                $query
                    ->inCharge(
                        admin: true,
                        action: EnumActions::Manage
                    )
                    ->orderBy(
                        City::select('name')
                            ->whereColumn('cities.id', 'games.city_id'),
                        'desc'
                    );
            })
            ->get();

        return view('schedules.index', [
            'schedules' => $schedules,
        ]);
    }
}

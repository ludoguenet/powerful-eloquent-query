<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __invoke()
    {
        $schedules = Schedule::query()
            ->get();

        return view('schedules.index', [
            'schedules' => $schedules,
        ]);
    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\EnumActions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    public function scopeInCharge(
        Builder $query,
        bool $admin,
        EnumActions $action,
    ): void {
        if ($admin) {
            $query
                ->where(function (Builder $query) use ($action) {
                    $query->whereHas('stadium', fn (Builder $query) => $query
                        ->where('doors_closed', false)
                    )
                        ->orWhereHas('stadium', fn (Builder $query) => $query
                            ->where('doors_closed', true)
                            ->whereHas('user.actions', fn (Builder $query) => $query
                                ->where('name', $action->value)
                            )
                        );
                });
        }

        if (! $admin) {
            $query
                ->whereHas('stadium', fn (Builder $query) => $query
                    ->where('doors_closed', true)
                );
        }
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function stadium(): BelongsTo
    {
        return $this->belongsTo(Stadium::class);
    }

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }
}

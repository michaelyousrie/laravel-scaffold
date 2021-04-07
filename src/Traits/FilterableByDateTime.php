<?php
namespace LaravelScaffold\Traits;

use Carbon\Carbon;

trait FilterableByDateTime
{
    public function scopeToday($query)
    {
        return $query->whereDate('created_at', Carbon::today());
    }

    public function scopeYesterday($query)
    {
        return $query->whereDate('created_at', Carbon::today()->subDay());
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('created_at', Carbon::today()->month);
    }

    public function scopeThisYear($query)
    {
        return $query->whereYear('created_at', Carbon::today()->year);
    }

    public function scopeBetweenDates($query, Carbon $before, Carbon $after)
    {
        return $query->whereBetween('created_at', [$before->subDay()->toDateString(), $after->addDay()->toDateString()]);
    }

    public function scopeAfterDate($query, Carbon $after)
    {
        return $query->whereDate('created_at', '>', $after->toDateString());
    }

    public function scopeAfterOrEqualDate($query, Carbon $after)
    {
        return $query->whereDate('created_at', '>=', $after->toDateString());
    }

    public function scopeBeforeDate($query, Carbon $before)
    {
        return $query->whereDate('created_at', '<', $before->toDateString());
    }

    public function scopeBeforeOrEqualDate($query, Carbon $before)
    {
        return $query->whereDate('created_at', '<=', $before->toDateString());
    }
}

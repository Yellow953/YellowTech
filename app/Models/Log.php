<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = ['action', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Filter
    public function scopeFilter($q)
    {
        if (request('text')) {
            $text = request('text');
            $q->where('text', 'LIKE', "%{$text}%");
        }
        if (request('startDate') || request('endDate')) {
            $startDate = request()->query('startDate') ?? Carbon::today();
            $endDate = request()->query('endDate') ?? Carbon::today()->addYears(100);
            $q->whereBetween('created_at', [$startDate, $endDate]);
        }

        return $q;
    }
}

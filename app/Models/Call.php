<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }
}

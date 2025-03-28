<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function images()
    {
        return $this->hasMany(Attachment::class);
    }

    public function can_delete()
    {
        return $this->invoices->count() == 0 && auth()->user()->role == 'admin';
    }
}

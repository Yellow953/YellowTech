<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function can_delete()
    {
        return auth()->user()->role == 'admin';
    }
}

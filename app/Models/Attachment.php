<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

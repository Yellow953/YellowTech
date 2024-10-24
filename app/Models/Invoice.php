<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function can_delete()
    {
       return auth()->user()->role=='admin';
    }

    public static function generate_number()
    {
        $lastInvoice = Invoice::latest()->first();

        if ($lastInvoice) {
            $lastNumber = explode('-', $lastInvoice->invoice_number)[1];
            return 'INV-' . ($lastNumber + 1);
        } else {
            return 'INV-1';
        }
    }
}

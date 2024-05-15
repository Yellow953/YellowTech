<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function secondary_images()
    {
        return $this->hasMany(Attachment::class, 'product_id');
    }

    // Filter
    public function scopeFilter($q)
    {
        if (request('name')) {
            $name = request('name');
            $q->where('name', 'LIKE', "%{$name}%");
        }
        if (request('condition')) {
            $condition = request('condition');
            $q->where('condition', $condition);
        }
        if (request('price_min')) {
            $price_min = request('price_min');
            $q->where('unit_price', '>=', $price_min);
        }
        if (request('price_max')) {
            $price_max = request('price_max');
            $q->where('unit_price', '<=', $price_max);
        }

        return $q;
    }
}

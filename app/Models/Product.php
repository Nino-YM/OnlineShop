<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'image_name',
        'name',
        'description',
        'price',
        'stock_quantity',
        'category_id'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category', 'product_id', 'category_id');
    }

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'product_promotion', 'product_id', 'promotion_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')->withPivot('quantity', 'price');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function getDiscountedPriceAttribute()
    {
        $promotion = $this->promotions()->where('start_date', '<=', now())
                                       ->where('end_date', '>=', now())
                                       ->first();

        if ($promotion) {
            $discount = ($this->price * $promotion->discount_percentage) / 100;
            return $this->price - $discount;
        }

        return $this->price;
    }
}

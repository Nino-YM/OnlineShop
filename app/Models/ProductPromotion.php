<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPromotion extends Model
{
    use HasFactory;

    protected $table = 'product_promotion';

    protected $fillable = [
        'product_id',
        'promotion_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'discount_percentage', 'start_date', 'end_date'
    ];

    protected $dates = [
        'start_date', 'end_date',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value);
    }
}

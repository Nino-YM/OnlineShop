<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressUser extends Model
{
    use HasFactory;

    protected $table = 'address_user';

    protected $fillable = [
        'user_id',
        'address_id'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'productID',
        'productName',
        'qty',
        'price',
        'tax',
        'total',
        'discount',
        'net',
        'userID',
        'username',
    ];
}

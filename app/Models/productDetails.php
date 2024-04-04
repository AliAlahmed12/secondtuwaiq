<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'price',
        'qty',
        'description',
        'productID',
        'image'
    ];

}

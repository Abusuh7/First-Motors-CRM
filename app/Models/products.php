<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'product_price',
        'product_description',
        'product_image',
        // 'product_more_image',
        'product_category',
        'product_stock',
        'product_status',
    ];
}

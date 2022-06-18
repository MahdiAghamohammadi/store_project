<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cart_items';

    protected $fillable = [
        'color_id',
        'guarantee_id',
        'user_id',
        'product_id',
        'number',
    ];
}

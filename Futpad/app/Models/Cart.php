<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $cart = 'cart';
    public function getRouteKeyName()
    {
        return 'name';
    }
    use HasFactory;
}

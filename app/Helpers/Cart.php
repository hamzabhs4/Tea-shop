<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class Cart
{
    public static function count()
    {
        $cart = Session::get('cart', []);
        return array_sum(array_column($cart, 'quantity'));
    }

    public static function total()
    {
        $cart = Session::get('cart', []);
        $total = 0;
        
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return $total;
    }

    public static function items()
    {
        return Session::get('cart', []);
    }
} 
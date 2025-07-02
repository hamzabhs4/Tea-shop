<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure the user is logged in
    }

    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->with('items')->latest()->paginate(10); // Get orders for the logged in user

        return view('user.orders.index', compact('orders'));
    }

    // You might add a show method later to view specific order details
    // public function show(Order $order)
    // {
    //     // Ensure the order belongs to the logged in user
    //     if ($order->user_id !== Auth::id()) {
    //         abort(403);
    //     }
    //     $order->load('items.product'); // Load items and their products
    //     return view('user.orders.show', compact('order'));
    // }
} 
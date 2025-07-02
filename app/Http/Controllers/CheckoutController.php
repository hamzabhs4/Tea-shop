<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        // Check if the authenticated user is active
        if (Auth::check() && !Auth::user()->is_active) {
            return redirect()->route('cart.index')->with('error', 'Votre compte est désactivé. Vous ne pouvez pas passer de commande.');
        }

        if (!session()->has('cart') || empty(session('cart'))) {
            return redirect()->route('cart.index')->with('error', 'Votre panier est vide.');
        }

        $cart = session('cart');
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('checkout', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        // Check if the authenticated user is active
        if (Auth::check() && !Auth::user()->is_active) {
            return redirect()->route('cart.index')->with('error', 'Votre compte est désactivé. Vous ne pouvez pas passer de commande.');
        }

        Log::info('Début du traitement de la commande', ['request' => $request->all()]);

        try {
            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'postal_code' => 'required|string|max:10',
                'city' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'payment_method' => 'required|in:cod,card',
            ]);

            Log::info('Données validées', ['validated' => $validated]);

            DB::beginTransaction();

            $cart = session('cart');
            $subtotal = collect($cart)->sum(function ($item) {
                return $item['price'] * $item['quantity'];
            });
            $tax = 0;
            $total = $subtotal;

            Log::info('Calculs effectués', ['subtotal' => $subtotal, 'tax' => $tax, 'total' => $total]);

            $order = Order::create([
                'user_id' => Auth::id(),
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'],
                'postal_code' => $validated['postal_code'],
                'city' => $validated['city'],
                'country' => $validated['country'],
                'subtotal' => $subtotal,
                'tax' => $tax,
                'total' => $total,
                'status' => 'confirmed',
                'payment_method' => $validated['payment_method'],
            ]);

            Log::info('Commande créée', ['order' => $order->toArray()]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'name' => $item['name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity']
                ]);
            }

            Log::info('Éléments de commande créés');

            DB::commit();

            session()->forget('cart');

            Log::info('Commande finalisée avec succès');

            return redirect()->route('order.confirmation', $order)
                ->with('success', 'Votre commande a été confirmée avec succès !');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors du traitement de la commande', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors du traitement de votre commande. Veuillez réessayer.')
                ->withInput();
        }
    }

    public function confirmation(Order $order)
    {
        $order->load('items');
        
        return view('order-confirmation', compact('order'));
    }
} 
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = 0;
        
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);

        // Validate the quantity
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $quantity = $request->quantity;

        if (isset($cart[$product->id])) {
            // If product is already in cart, add the requested quantity
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            // If product is not in cart, add it with the requested quantity
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }

    public function update(Request $request, Product $product)
    {
        $cart = Session::get('cart', []);
        
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $request->quantity;
            Session::put('cart', $cart);
        }
        
        // If it's an AJAX request, return JSON
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Quantité mise à jour !']);
        }
        
        return redirect()->back()->with('success', 'Quantité mise à jour !');
    }

    public function remove(Product $product)
    {
        $cart = Session::get('cart', []);
        
        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            Session::put('cart', $cart);
        }
        
        return redirect()->back()->with('success', 'Produit retiré du panier !');
    }

    public function clear()
    {
        Session::forget('cart');
        return redirect()->back()->with('success', 'Panier vidé !');
    }
} 
<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = $this->getCartItems();
        $subtotal = $cartItems->sum('subtotal');
        
        return view('cart.index', compact('cartItems', 'subtotal'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'variant_details' => 'nullable|array',
        ]);

        $cartData = [
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'variant_details' => $request->variant_details,
        ];

        if (auth()->check()) {
            $cartData['user_id'] = auth()->id();
            Cart::updateOrCreate(
                ['user_id' => auth()->id(), 'product_id' => $product->id],
                $cartData
            );
        } else {
            $sessionId = $this->getOrCreateSessionId();
            $cartData['session_id'] = $sessionId;
            Cart::updateOrCreate(
                ['session_id' => $sessionId, 'product_id' => $product->id],
                $cartData
            );
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart->update(['quantity' => $request->quantity]);

        return redirect()->back()->with('success', 'Cart updated!');
    }

    public function remove(Cart $cart)
    {
        $cart->delete();

        return redirect()->back()->with('success', 'Item removed from cart!');
    }

    public function clear()
    {
        if (auth()->check()) {
            Cart::where('user_id', auth()->id())->delete();
        } else {
            $sessionId = Session::get('cart_session_id');
            if ($sessionId) {
                Cart::where('session_id', $sessionId)->delete();
            }
        }

        return redirect()->back()->with('success', 'Cart cleared!');
    }

    private function getCartItems()
    {
        if (auth()->check()) {
            return Cart::with('product.primaryImage')
                ->where('user_id', auth()->id())
                ->get();
        } else {
            $sessionId = Session::get('cart_session_id');
            if ($sessionId) {
                return Cart::with('product.primaryImage')
                    ->where('session_id', $sessionId)
                    ->get();
            }
        }

        return collect();
    }

    private function getOrCreateSessionId()
    {
        if (!Session::has('cart_session_id')) {
            Session::put('cart_session_id', 'guest_' . uniqid('', true));
        }

        return Session::get('cart_session_id');
    }
}


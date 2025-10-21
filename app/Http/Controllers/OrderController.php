<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items.product')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $this->authorize('view', $order);

        $order->load('items.product');

        return view('orders.show', compact('order'));
    }

    public function checkout()
    {
        $cartItems = $this->getCartItems();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $subtotal = $cartItems->sum('subtotal');
        
        return view('orders.checkout', compact('cartItems', 'subtotal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string',
            'billing_address' => 'required|string',
            'payment_method' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $cartItems = $this->getCartItems();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        DB::beginTransaction();
        
        try {
            $subtotal = $cartItems->sum('subtotal');
            $taxAmount = 0; // Can be calculated based on settings
            $shippingAmount = 0; // Can be calculated based on settings
            $totalAmount = $subtotal + $taxAmount + $shippingAmount;

            $order = Order::create([
                'user_id' => auth()->id() ?? null,
                'order_number' => Order::generateOrderNumber(),
                'status' => 'pending',
                'subtotal' => $subtotal,
                'tax_amount' => $taxAmount,
                'shipping_amount' => $shippingAmount,
                'total_amount' => $totalAmount,
                'shipping_address' => $request->shipping_address,
                'billing_address' => $request->billing_address,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'notes' => $request->notes,
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'product_sku' => $item->product->sku,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->product->current_price,
                    'total_price' => $item->subtotal,
                    'variant_details' => $item->variant_details,
                ]);

                // Update stock
                $item->product->decrement('stock_quantity', $item->quantity);
            }

            // Clear cart
            if (auth()->check()) {
                Cart::where('user_id', auth()->id())->delete();
            } else {
                $sessionId = Session::get('cart_session_id');
                if ($sessionId) {
                    Cart::where('session_id', $sessionId)->delete();
                }
            }

            DB::commit();

            return redirect()->route('orders.show', $order)->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to place order. Please try again.');
        }
    }

    private function getCartItems()
    {
        if (auth()->check()) {
            return Cart::with('product')->where('user_id', auth()->id())->get();
        } else {
            $sessionId = Session::get('cart_session_id');
            if ($sessionId) {
                return Cart::with('product')->where('session_id', $sessionId)->get();
            }
        }

        return collect();
    }
}


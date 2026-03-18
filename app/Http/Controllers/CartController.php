<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart  = session('cart', []);
        $total = array_sum(array_map(fn($item) => $item['price'] * $item['quantity'], $cart));
        return view('cart.index', compact('cart', 'total'));
    }

    public function add(Product $product)
    {
        $cart = session('cart', []);
        $id   = $product->id;

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'id'       => $product->id,
                'name'     => $product->name,
                'price'    => $product->price,
                'image'    => $product->image,
                'quantity' => 1,
            ];
        }

        session(['cart' => $cart]);
        return redirect()->back()->with('added', $product->name);
    }

    public function remove(Product $product)
    {
        $cart = session('cart', []);
        unset($cart[$product->id]);
        session(['cart' => $cart]);
        return redirect()->route('cart.index');
    }

    public function buy()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', '¡Compra realizada con éxito!');
    }
}

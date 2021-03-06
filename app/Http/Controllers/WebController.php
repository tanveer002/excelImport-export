<?php

namespace App\Http\Controllers;

use App\Models\CartOrder;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class WebController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('productpage', compact('products'));
    }

    public function storeProduct($id)
    {
        $products = Product::findOrFail($id);
        $cart = session()->get('cart');

        if(!$cart){
            $cart = [
                $products->id => [
                'name' => $products->name,
                'quantity' => 1,
                'des' => $products->des,
                'price' => $products->price
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'add successfully');
        }

        if(isset($cart[$products->id])){
            $cart[$products->id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->route('cart.index')->with('success', 'add successfully');
        }

        $cart[$products->id] = [
            'name' => $products->name,
                'quantity' => 1,
                'des' => $products->des,
                'price' => $products->price
        ];

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'add successfully');
    }

    public function removeProduct($id)
    {
       
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success', 'Remove item from cart successfully');
    }

    public function cart()
    {
        
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function confirmOrder(Request $request)
    {
        $cart = session()->get('cart');
       $orders = new CartOrder();
       $orders->name = $request->name;
       $orders->email = $request->email;
       $orders->address = $request->address;
        $orders->order = json_encode($cart);
        $orders->save();

        return redirect()->back();
        
        
    }

    public function showOrder()
    {
        $orders = CartOrder::all();
        // dd($orders);
        return view('showorder', compact('orders'));
    }
}

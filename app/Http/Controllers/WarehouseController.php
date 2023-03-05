<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {

        $products = Product::all();

        return view('warehouse.warehouse', compact('products'));

    }

//    public function retrieve(Product $product, $amount)
//    {
//
//        if ($product->quantity > 0) {
//            $amount->quantity--;
//            $product->save();
//            return redirect()->back()->with('success', 'Product retrieved successfully.');
//        } else {
//            return redirect()->back()->with('error', 'Product not available in the warehouse.');
//        }
//    }
    public function update(Request $request)
    {
        if($request->id && $request->action){
            $cart = session()->get('cart');
            $cart[$request->id]["action"] = $request->action;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function retrieve(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);
        $price    = $request->input('price', 1);

        if ($product->quantity >= $quantity) {
            $product->decreaseQuantity($quantity);
            $product->amountQuantity($price);
            return redirect()->back()->with('success', 'Products retrieved successfully.');
        } else {
            return redirect()->back()->with('error', 'Products not available in the warehouse.');
        }
    }

    public function create()
    {
        return view('warehouse.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('warehouse.warehouse')->with('success', 'Product added successfully.');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
}

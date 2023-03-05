<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//class Product extends Model
//{
//    use HasFactory;
//    public function retrieve(Product $product)
//    {
//        if ($product->quantity > 0) {
//            $product->save();
//            return redirect()->back()->with('success', 'Product retrieved successfully.');
//        } else {
//            return redirect()->back()->with('error', 'Product not available in the warehouse.');
//        }
//    }
//}
class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'quantity', 'price'];

    public function decreaseQuantity($amount)
    {
        $this->quantity -= $amount;
        $this->save();
    }

    public function amountQuantity(mixed $amount)
    {
        $this->price *= $amount;
        $this->save();
    }
}

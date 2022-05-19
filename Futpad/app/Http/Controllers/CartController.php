<?php

namespace App\Http\Controllers;

use App\Models\Cart as ModelsCart;
use App\Models\Order_details;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Products;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmed;
use PHPUnit\Framework\MockObject\Builder\Identity;

class CartController extends Controller
{

    public function add(Request $request)
    {
        if (auth()->user()->type == "customer") {
            $item = Products::find($request->product_id);
            //sreturn $item->url;
            Cart::add(
                $item->id,
                $item->name,
                $item->price,
                1,
            );
            return back()->with('success', "$item->name ¡se ha agregado con éxito al carrito!");
        }
        return back();
    }

    public function cart()
    {

        return view('cart');
    }

    public function removeitem(Request $request)
    {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        Cart::remove([
            'id' => $request->id,
        ]);
        return back()->with('success', "Producto eliminado con éxito de su carrito.");
    }

    public function clear()
    {
        Cart::clear();
        return back()->with('success', "The shopping cart has successfully beed added to the shopping cart!");
    }

    public function store(Request $request)
    {

        //return auth()->user()->id;
        //return  Cart::getContent();
        $products = Cart::getContent();
        //return count($products);
        if (count($products) > 0) {
            Orders::insert([
                "user_id" => auth()->user()->id
            ]);
            $last =  DB::table('orders')->latest('order_id')->first();
            foreach ($products as $product) {
                Order_details::insert([
                    "order_id"      =>  $last->order_id,
                    "product_id"    =>  $product->id,
                    "quantity"      =>  $product->quantity,
                    "price"         =>  $product->price
                ]);
            }
            Mail::to($request->owner_email)->queue(new OrderConfirmed($products, $last->order_id));
            Cart::clear();
        } else {
            return redirect("/cuenta");
        }
        return view("order_confirmed");
    }
}

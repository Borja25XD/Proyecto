<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Cart;

class CartController extends Controller
{
    
    public function add(Request $request){
        $item = Products::find($request->product_id);

        Cart::add(
            $item->id,
            $item->nombre,
            $item->precio,
            1
            
        );
        return back()->with('success',"$item->nombre ¡se ha agregado con éxito al carrito!");
   
    }

    public function cart(){
        
        return view('cart');
    }

    public function removeitem(Request $request) {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }

}

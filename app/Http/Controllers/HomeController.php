<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Backend\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * ini adalah function untuk home halaman 
     * depan dari webiste toko online yang buat
     */
    public function prdcuser()
    {
        $product = product::all();
        return view('layouts.frontend.product', compact('product'));
    }
    
    public function homeuser()
    {
        $product = product::paginate(4);
        return view('layouts.frontend.homeuser', compact('product'));
    }


    public function index()
    { 
            $product = DB::table('products')->paginate(4);
            return view('frontend.home.index', compact('product'));
    }

    public function adminHome()
    {
        return view('layouts.backend.master');
    }
    /**
     * ini adalah function untuk seluruh product
     * webiste toko online yang buat
     */
    public function product()
    {
        return view('frontend.product.index');
    }

    /**
     * ini adalah function untuk halaman detail
     * dari product yang kita buat pada crud product
     */
    public function detail($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('frontend.product.detail', compact('product', $product));
    }

    /**
     * ini adalah function untuk melihat product 
     * yang sudah dimasukan dalam database cart / keranjang
     */
    public function cart()
    {
        $product =Product::all();
        return view('frontend.cart.index', compact('product'));
    }

    /**
     * ini adalah function memasukan product ke dalam
     * keranjang belanja kita, atau add to cart
     */
    public function addToCart(Request $request ,$id)
    {
        $products = Product::findOrFail($id);

        $cart = session()->get('cart', []);


        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'title' => $products->title,
                'harga' => $products->harga,
                'image' => $products->image,
                'quantity' => 1
            ];
        }



        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk sudah masuk ke dalam keranjang');
    }

    /**
     * ini adalah function menghapus salah satu product
     * yang ada dalam keranjang belanja
     */
    public function destroy_cart_product($id)
    {
        //
    }


    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Keranjang berhasil di perbarui!');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Produk berhasil dihapus');
        }
    }
}

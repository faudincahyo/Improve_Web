<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Backend\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * ini adalah function untuk home halaman 
     * depan dari webiste toko online yang buat
     */
    public function index()
    {
 
            $product = product::paginate(8);
            $product = DB::table('products')->get();
            return view('frontend.home.index', compact('product'));
    }

    public function adminHome()
    {
        return view('layouts.backend.master');
    }
    // MASIH COBA-COBA BUAT MULTIPLE USER
    // public function indexHome()
    // {
    //     return view('backend.index');
    // }

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
        //
        return view('frontend.cart.index');
    }

    /**
     * ini adalah function memasukan product ke dalam
     * keranjang belanja kita, atau add to cart
     */
    public function add_to_cart(Request $request)
    {
        //
    }

    /**
     * ini adalah function menghapus salah satu product
     * yang ada dalam keranjang belanja
     */
    public function destroy_cart_product($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    
    public function index()
    {
        return view('layouts.frontend.about');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->back()->with('success', 'Email berhasil terkirim, Terima kasih atas masukkan anda');
    }
}

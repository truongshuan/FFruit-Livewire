<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        return view('client.pages.cart');
    }
}

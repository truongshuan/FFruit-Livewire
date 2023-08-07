<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('client.pages.about');
    }
}

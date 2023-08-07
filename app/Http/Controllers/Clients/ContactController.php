<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        return view('client.pages.contact');
    }
}

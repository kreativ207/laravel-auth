<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function test()
    {
        return view('test');
    }

    public function emailConfirmed()
    {
        return view('email_confirm');
    }
}

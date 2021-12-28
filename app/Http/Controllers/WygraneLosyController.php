<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WygraneLosyController extends Controller
{
    public function index(Request $request)
    {
        return view('wygraneLosy');

    }

}

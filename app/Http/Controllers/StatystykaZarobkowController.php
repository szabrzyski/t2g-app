<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatystykaZarobkowController extends Controller
{
    public function index(Request $request)
    {
        return view('statystykaZarobkow');

    }

}

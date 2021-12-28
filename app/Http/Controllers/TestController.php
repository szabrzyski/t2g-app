<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function __construct()
    {

    }

    public function test(Request $request, User $uzytkownik)
    {

      
       return false;

    }

}

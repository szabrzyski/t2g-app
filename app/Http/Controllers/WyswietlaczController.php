<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WyswietlaczController extends Controller
{
    public function index(Request $request)
    {

        return view('wyswietlacz');

    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wyswietlLiczbe(Request $request, $liczba = null)
    {

if(!is_numeric($liczba)) {
    dd('Nie wprowadzono poprawnej liczby');
}
        $skladoweWszystkichCyfr = [
            0 => [' _ ', '| |', '|_|'],
            1 => ['   ', ' | ', ' | '],
            2 => [' _ ', ' _|', '|_ '],
            3 => [' _ ', ' _|', ' _|'],
            4 => ['   ', '|_|', '  |'],
            5 => [' _ ', '|_ ', ' _|'],
            6 => [' _ ', '|_ ', '|_|'],
            7 => [' _ ', '  |', '  |'],
            8 => [' _ ', '|_|', '|_|'],
            9 => [' _ ', '|_|', ' _|'],
        ];

        $cyfry = str_split($liczba);
        $skladoweLiczby = [];

        foreach ($cyfry as $cyfra) {
            $skladoweLiczby[0][] = $skladoweWszystkichCyfr[$cyfra][0];
            $skladoweLiczby[1][] = $skladoweWszystkichCyfr[$cyfra][1];
            $skladoweLiczby[2][] = $skladoweWszystkichCyfr[$cyfra][2];
        }
        dd(implode("", $skladoweLiczby[0]).PHP_EOL.implode("", $skladoweLiczby[1]).PHP_EOL.implode("", $skladoweLiczby[2]));

    }

}

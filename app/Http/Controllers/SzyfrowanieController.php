<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SzyfrowanieController extends Controller
{
    public function index(Request $request)
    {

        return view('szyfrowanie');

    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function zaszyfrujWiadomosc(Request $request)
    {

        $walidator = Validator::make($request->all(), [
            'wiadomoscDoZaszyfrowania' => 'present',
        ]);

        if ($walidator->fails()) {
            return response()->json(['komunikat' => 'Nie wprowadzono żadnej wiadomości'], 521);
        }
        $wiadomoscDoZaszyfrowania = preg_split('//u', $request->wiadomoscDoZaszyfrowania, null, PREG_SPLIT_NO_EMPTY);
        $kluczSzyfrujacy =
        array_flip(['!' => 'a',
        ')' => 'b',
        '"' => 'c',
        '(' => 'd',
        '£' => 'e',
        '*' => 'f',
        '%' => 'g',
        '&' => 'h',
        '>' => 'i',
        '<' => 'j',
        '@' => 'k',
        'a' => 'l',
        'b' => 'm',
        'c' => 'n',
        'd' => 'o',
        'e' => 'p',
        'f' => 'q',
        'g' => 'r',
        'h' => 's',
        'i' => 't',
        'j' => 'u',
        'k' => 'v',
        'l' => 'w',
        'm' => 'x',
        'n' => 'y',
        'o' => 'z']);

        $zaszyfrowanaWiadomoscArray = array_map(function ($znak) use ($kluczSzyfrujacy) {
            if (array_key_exists($znak, $kluczSzyfrujacy)) {
                return $kluczSzyfrujacy[$znak];
            } else {
                return $znak;
            }
        }, $wiadomoscDoZaszyfrowania);
        $zaszyfrowanaWiadomosc = implode("", $zaszyfrowanaWiadomoscArray);

        return response()->json(['zaszyfrowanaWiadomosc' => $zaszyfrowanaWiadomosc], 200);

    }

      /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function odszyfrujWiadomosc(Request $request)
    {

        $walidator = Validator::make($request->all(), [
            'wiadomoscDoOdszyfrowania' => 'present',
        ]);

        if ($walidator->fails()) {
            return response()->json(['komunikat' => 'Nie wprowadzono żadnej wiadomości'], 521);
        }
        $wiadomoscDoOdszyfrowania= preg_split('//u', $request->wiadomoscDoOdszyfrowania, null, PREG_SPLIT_NO_EMPTY);
        $kluczSzyfrujacy =
            ['!' => 'a',
            ')' => 'b',
            '"' => 'c',
            '(' => 'd',
            '£' => 'e',
            '*' => 'f',
            '%' => 'g',
            '&' => 'h',
            '>' => 'i',
            '<' => 'j',
            '@' => 'k',
            'a' => 'l',
            'b' => 'm',
            'c' => 'n',
            'd' => 'o',
            'e' => 'p',
            'f' => 'q',
            'g' => 'r',
            'h' => 's',
            'i' => 't',
            'j' => 'u',
            'k' => 'v',
            'l' => 'w',
            'm' => 'x',
            'n' => 'y',
            'o' => 'z'];

        $odszyfrowanaWiadomoscArray = array_map(function ($znak) use ($kluczSzyfrujacy) {

            if (array_key_exists($znak, $kluczSzyfrujacy)) {
                return $kluczSzyfrujacy[$znak];
            } else {
                return $znak;
            }
        }, $wiadomoscDoOdszyfrowania);
        $odszyfrowanaWiadomosc = implode("", $odszyfrowanaWiadomoscArray);

        return response()->json(['odszyfrowanaWiadomosc' => $odszyfrowanaWiadomosc], 200);

    }


}

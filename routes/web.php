<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\SzyfrowanieController;
use App\Http\Controllers\WyswietlaczController;
use App\Http\Controllers\WygraneLosyController;
use App\Http\Controllers\StatystykaZarobkowController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Strona główna
Route::get('/', function () {
    return redirect()->route('szyfrowanie');
})->name('glowna');

// Zadanie - łamacz kodu
Route::get('/szyfrowanie', [SzyfrowanieController::class, 'index'])->name('szyfrowanie');

// Szyfrowanie wiadomości
Route::post('/szyfrowanie/zaszyfrujWiadomosc', [SzyfrowanieController::class, 'zaszyfrujWiadomosc'])->name('zaszyfrujWiadomosc');

// Odszyfrowanie wiadomości
Route::post('/szyfrowanie/odszyfrujWiadomosc', [SzyfrowanieController::class, 'odszyfrujWiadomosc'])->name('odszyfrujWiadomosc');

// Zadanie - wyświetlacz LCD
Route::get('/wyswietlacz', [WyswietlaczController::class, 'index'])->name('wyswietlacz');

// Wyświetlanie liczby na ekranie LCD
Route::get('/wyswietlacz/wyswietlLiczbe/{liczba?}', [WyswietlaczController::class, 'wyswietlLiczbe'])->name('wyswietlLiczbe');

// Zadanie - wygrane losy
Route::get('/wygraneLosy', [WygraneLosyController::class, 'index'])->name('wygraneLosy');

// Zadanie - statystyka zarobków
Route::get('/statysykaZarobkow', [StatystykaZarobkowController::class, 'index'])->name('statystykaZarobkow');

// Funkcja testowa
Route::get('/test', [TestController::class, 'test'])->name('test');

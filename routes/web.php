<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::any('/any', function () {
    return "Permite todo tipo de acesso HTTP.";
});

Route::match(['get', 'delete'], '/match', function () {
    return "Permite apenas acessos definidos";
});

Route::get('/produto/{id}/{cat?}', function ($id, $cat = "limpeza") {
    return "O id do produto é: ".$id."<br>"."E sua categoria é: ".$cat;
});

Route::redirect('/sobre', 'empresa');

Route::view('/empresa', 'site/empresa');

Route::get('/news', function() {
    return view('news');
})->name('noticias');

Route::get('/novidades', function () {
    return redirect()->route('noticias');
});


Route::group([
    "prefix" => "admin",
    "as" => "admin."
], function () {
    Route::get('dashboard', function() {
        return "Dashboard";
    })->name('dashboard');
    Route::get('produtos', function() {
        return "Produtos";
    })->name('produtos');
    Route::get('clientes', function() {
        return "Clientes";
    })->name('clientes');
});


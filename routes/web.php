<?php
use App\products;
use App\categories;
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
// $prod = new products();
// $prod->nombre = 'Producto 3';
// $prod->slug = 'Producto 3';
// $prod->category_id = 1;
// $prod->descripcion_corta = 'Producto';
// $prod->descripcion_larga = 'Producto';
// $prod->especificaciones = 'Producto';
// $prod->dato_de_interes = 'Producto';
// $prod->estado = 'Nuevo';
// $prod->activo = 'Si';
// $prod->slider_principal = 'No';
// $prod->save();
// return $prod;

// $prod = products::find(3)->category;
// return $prod;

// $cat = categories::find(2)->product;
// return $cat;

    return view('shop.index');
});

Route::get('/form', function () {
    return view('form.form');
});
Route::get('/admin', function () {
    return view('layouts.admin');
});
Route::get('/create-category', function () {
    return view('admin.category.create');
});

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();


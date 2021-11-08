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

/*
verbo http:
get
post
put
patch
delete
options 
*/

// Route::get('/', function () {
//     return view('welcome');
//     return "Olá seja bem vindo ao curso!";
// });

// Route::get('/sobre-nos', function(){
//     return 'Sobre-nós';
// });

// Route::get('/contato', function(){
//     return 'Contato';
// });


Route::get('/', 'App\Http\Controllers\PrincipalController@principal');
Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@sobreNos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato']);






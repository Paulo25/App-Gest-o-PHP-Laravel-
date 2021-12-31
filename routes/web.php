<?php

use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
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

/* rotas com pametros opcionais e tipagagem nas variaveis  */

// Route::get('/contato/{nome}/{sexo?}/{idade?}', function(string $nome, string $sexo = 'indefinido', int $idade = 0){
//           echo "Estamos aqui: {$nome} - {$sexo} - {$idade}";
// });

/* Tratativas de parametros com expressão regular*/

// Route::get('
//           /contato/{nome}/{categoria_id}', 
//           function(
//                     string $nome = 'Desconhecido', 
//                     int $categoria_id = 1 // 1 = informação
//                     ){
//           echo "Estamos aqui: {$nome} - {$categoria_id}";
//           }
// )->where('nome', '[A-Za-z]+')
// ->where('categoria_id', '[0-9]+');

/* Redirecionamente de rotas */

// Route::get('/rota1', function(){
//           echo 'Rota 1';
// })->name('site.rota1');
// Route::get('/rota2', function(){
//           //echo 'Rota 2';
//           return redirect()->route('site.rota1');
// })->name('site.rota2');
//Route::redirect('/rota2', '/rota1'); //redirecionamento de routas -> ao acessar a rota2 automaticamente será redirecionado para rota1

/* Rota de contigência: caso usuário acessa uma determinada rota inexistente, ele cairá nessa rota de fallback*/
Route::fallback(function(){ 
          echo 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');

Route::get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/login', function(){return 'Login';})->name('site.login');


Route::prefix('/app')->group(function(){
          Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
          Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
          Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');
});






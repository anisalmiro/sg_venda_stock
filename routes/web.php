<?php

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
    return view('auth/login');
});
Route::get('/logout', function() {
   Auth::logout();
   return Redirect::to('login');
});
Auth::routes();

Route::group(['middleware' => ['auth']], function() {
	# DASHBOARD
	Route::get('/home', 'HomeController@index')->name('home');

	# TABELA DE PRECO
	Route::get('/gettabpreco/{id}', 'MainController@getPreco')->name('gettabpreco');
	# DETALHES DO STK
	Route::get('/getstkdetalhes/{id}', 'MainController@getStk')->name('getstkdetalhes');
	# DETALHES DO TIPO DE PAGAMENTO
	Route::get('/gettipopag/{id}', 'MainController@getTipopag')->name('gettipopag');
	# DETALHES DO BANCO
	Route::get('/getbanco/{id}', 'MainController@getBanco')->name('getbanco');
	# DETALHES DA CONTA TE TESOURARIA
	Route::get('/getcontatesoura/{id}', 'MainController@getContatesoura')->name('getcontatesoura');

	# CLIENTES
	Route::get('/clientes', 'ClienteController@index')->name('clientes');
	Route::get('/cliente/add', 'ClienteController@create')->name('cliente.create');
	Route::post('/cliente/store', 'ClienteController@store')->name('cliente.store');
	Route::get('/clientes/show/{id}', 'ClienteController@show')->name('cliente.show');
	Route::get('/clientes/edit/{id}', 'ClienteController@edit')->name('cliente.edit');
	Route::put('/clientes/update/{id}', 'ClienteController@update')->name('cliente.update');
	Route::get('/clientes/delete/{id}', 'ClienteController@delete')->name('cliente.delete');
	Route::get('/clientes/destroy/{id}', 'ClienteController@destroy')->name('cliente.destroy');

	# REQUISICAO AJAX PARA CARREGAR LISTA DE CLIENTES
	Route::get('/getclientes', 'ClienteController@getClientes')->name('getclientes');


	# VENDAS
	Route::get('/tiposfat', 'FatController@index')->name('tiposfat');
	# REQUISICAO AJAX PARA CARREGAR LISTA DE TIPOS DE DOCMENTOS DE FATURACAO
	Route::get('/gettiposfat', 'FatController@getTiposFat')->name('gettiposfat');
	# REQUISICAO AJAX PARA CARREGAR LISTA DE DOCMENTOS DE FATURACAO
	Route::get('/getfats/{id}', 'FatController@getFats')->name('getfats');
	Route::get('/fats/{id}', 'FatController@listafats')->name('fats');
	Route::get('/fat/add/{id}', 'FatController@create')->name('fat.create');
	Route::post('/fat/store', 'FatController@store')->name('fat.store');
	Route::get('/fat/show/{id}', 'FatController@show')->name('fat.show');
	Route::get('/fat/edit/{id}', 'FatController@edit')->name('fat.edit');
	Route::put('/fat/update/{id}', 'FatController@update')->name('fat.update');
	Route::get('/fat/delete/{id}', 'FatController@delete')->name('fat.delete');
	Route::get('/fat/destroy/{id}', 'FatController@destroy')->name('fat.destroy');

	# PRODUCTOS & SERVIÇOS
	Route::get('/stk', 'StkController@index')->name('stk');
	Route::get('/stk/add', 'StkController@create')->name('stk.create');
	Route::post('/stk/store', 'StkController@store')->name('stk.store');
	Route::get('/stk/edit/{id}', 'StkController@edit')->name('stk.edit');
	Route::put('/stk/update/{id}', 'StkController@update')->name('stk.update');
	Route::get('/stk/delete/{id}', 'StkController@delete')->name('stk.delete');
	Route::get('/stk/destroy/{id}', 'StkController@destroy')->name('stk.destroy');

	# REQUISICAO AJAX PARA CARREGAR LISTA DE PRODUCTOS & SERVIÇOS
	Route::get('/getproductoservico', 'StkController@getproductoservico')->name('getproductoservico');
});

    # Fornecedores
    	Route::get('/fornecedor', 'FornecedorController@index')->name('fornecedor');
    	Route::get('/fornecedor/add', 'FornecedorController@create')->name('fornecedor.create');
    	Route::post('/fornecedor/store', 'FornecedorController@store')->name('fornecedor.store');
    	Route::get('/fornecedor/show/{id}', 'FornecedorController@show')->name('fornecedor.show');
        Route::get('/fornecedor/edit/{id}', 'FornecedorController@edit')->name('fornecedor.edit');
        Route::put('/fornecedor/update/{id}', 'FornecedorController@update')->name('fornecedor.update');
        Route::get('/fornecedor/delete/{id}', 'FornecedorController@delete')->name('fornecedor.delete');
        Route::get('/fornecedor/destroy/{id}', 'FornecedorController@destroy')->name('fornecedor.destroy');

# REQUISICAO AJAX PARA CARREGAR LISTA DE Fornecedores
	Route::get('/getfornecedores', 'FornecedorController@getfornecedores')->name('getfornecedores');

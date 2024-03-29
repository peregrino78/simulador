<?php

Route::get('/', function(){
    return redirect('/admin');
})->name('home');


Auth::routes();

Route::get('/avatar', 'UsersController@avatar')->name('avatar');
Route::get('/image/external', 'ImagesController@image')->name('image');

Route::middleware('auth')->group(function() {

	Route::prefix('admin')->middleware('setup.configs')->group(function() {

		Route::middleware('lock')->group(function() {

			Route::get('coeficiente', 'CoefficientsController@getByDate')->name('teste')->middleware('level:4');

			// Dashboard
			Route::get('/', 'AdminController@index');
			Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
			
			// Simulação
			Route::prefix('/simulacao')->group(function ()
			{
				// Forms Dados do Cliente
				Route::get('dados-cliente/op/{op?}', 'ClientsController@create')->name('client_create')->middleware('level:4');
				Route::resource('dados-cliente', 'ClientsController')->middleware('level:4');

				// Forms Simulação por Operação
				Route::get('contrato-novo/cliente/{id}', 'NewContractController@create')->name('simulacao_contrato_novo')->middleware('level:4');
				Route::get('portabilidade/cliente/{id?}', 'PortabilityController@create')->name('simulacao_portabilidade')->middleware('level:4');
				Route::get('refin-portabilidade/cliente/{id}', 'RefinancingPortabilityController@create')->name('simulacao_refin_portabilidade')->middleware('level:4');
				Route::post('check-client', 'ClientsController@check')->name('check-client');
				Route::get('simulacao-tipo/{operation?}/{id?}', 'ClientsController@redirect')->name('simulacao_tipo');

				Route::resource('contrato-novo', 'NewContractController')->middleware('level:4');
				Route::resource('portabilidade', 'PortabilityController')->middleware('level:4');
				Route::resource('refin-portabilidade', 'RefinancingPortabilityController')->middleware('level:4');
				
				Route::get('resultado', 'SimulationController@result')->name('simulation_result')->middleware('level:4');

				// Histórico de Simulações
				Route::get('simulacao/historico', 'SimulationHistoryController@historico')->name('simulacao.historico')->middleware('level:4');
			});

			// Convênio
			Route::resource('convenio', 'AgreementsController')->middleware('level:4');
			
			// Taxas do Banco / Coeficientes
			Route::resource('coeficientes', 'CoefficientsController')->middleware('level:4');
			Route::delete('coeficientes/delete', 'CoefficientsController@deleteAll')->middleware('level:4');

			// Clientes
			Route::resource('clientes', 'ClientsController')->middleware('level:4');

			// Estatísticas
			Route::resource('estatisticas', 'StatisticsController')->middleware('level:4');
		
			
			// Configurações da Aplicação
			Route::resource('users', 'UsersController')->middleware('level:4');

			Route::resource('configs', 'ConfigController')->middleware('level:4');

			Route::resource('permissoes', 'PermissoesController')->middleware('level:5');

			Route::resource('roles', 'RolesController')->middleware('level:5');
			Route::get('roles/{id}/permissoes', 'RolesController@permissoes')->name('role_permissoes')->middleware('level:5');
			Route::post('roles/permissoes/store', 'RolesController@permissoesStore')->name('role_permissoes_store')->middleware('level:5');
		});

		Route::get('lockscreen', 'LockAccountController@lockscreen')->name('lockscreen');
		Route::post('lockscreen', 'LockAccountController@unlock')->name('post_lockscreen');

	});
});

// Rota para buscar Cidade
Route::get('get-cities/{id?}', function ($id = null) {
    return \App\Models\City::where('state_id', $id)->get();
})->name('get-cities');
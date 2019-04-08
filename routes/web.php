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

			// Dashboard
			Route::get('/', 'AdminController@index');
			Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
			
			// Simulação
			Route::resource('simulacao', 'SimulationController')->middleware('level:4');

			// Histórico de Simulações
			Route::get('simulacao/historico', 'SimulationHistoryController@historico')->name('simulacao.historico')->middleware('level:4');

			// Convênio
			Route::resource('convenio', 'AgreementsController')->middleware('level:4');
			
			// Taxas do Banco / Coeficientes
			Route::resource('coeficientes', 'CoefficientsController')->middleware('level:4');

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
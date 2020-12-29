<?php

use App\Http\Controllers\Admin\PlanController;

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function(){

    /**
     * Rotas para perfis
     */
    Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');
    Route::resource('profiles', 'ACL\ProfileController');


    /**
     * Rotas para detalhes dos planos
     */
    Route::any('plan/search/{id}', 'DetailPlanController@search')->name('details.plan.search');
    Route::get('plan/{id}/details', 'DetailPlanController@index')->name('details.plan.index');
    Route::get('plan/{id}/details/create', 'DetailPlanController@create')->name('details.plan.create');
    Route::post('plan/{id}/details', 'DetailPlanController@store')->name('details.plan.store');
    Route::get('plan/{id}/details/{idDetails}', 'DetailPlanController@edit')->name('details.plan.edit');
    Route::put('plan/{id}/details/{idDetails}', 'DetailPlanController@update')->name('details.plan.update');
    Route::delete('plan/{id}/details{idDetails}', 'DetailPlanController@destroy')->name('details.plan.destroy');





    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::get('plans', 'PlanController@index')->name('plans.index');
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::post('plans/store', 'PlanController@store')->name('plans.store');
    Route::get('plans/show/{id}', 'PlanController@show')->name('plans.show');
    Route::get('plans/edit/{id}', 'PlanController@edit')->name('plans.edit');
    Route::put('plans/update/{id}', 'PlanController@update')->name('plans.update');
    Route::delete('plans/delete/{id}', 'PlanController@destroy')->name('plans.destroy');


    

  

});

Route::get('/', function () {
    return view('welcome');
});

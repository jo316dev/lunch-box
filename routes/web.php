<?php

use App\Http\Controllers\Admin\PlanController;

Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
        ->group(function(){



          Route::get('test-acl', function(){
            dd(auth()->user()->isAdmin());
          });


    
    /**
     * Cargos
     */
    Route::resource('roles', 'ACL\RoleController');

     /**
     * Tenants
     */
    // Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('tenants', 'TenantController');

  

    /**
     * Produtos
     */
    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');

    
      /**
     * Categorias
     */
    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');

    /**
     * Uusarios
     */
    Route::any('users/search', 'ACL\UserController@search')->name('users.search');
    Route::resource('users', 'ACL\UserController');

    /**
     * Rotas para perfis no plano
     */

    Route::get('plan/{id}/profiles', 'ACL\PlanProfilesController@profiles')->name('plan.profiles');
    Route::get('plan/{id}/profiles/create', 'ACL\PlanProfilesController@profilesAvailable')->name('plan.profiles.available');
    Route::post('plan/{id}/profiles/store', 'ACL\PlanProfilesController@profilesAttach')->name('plan.profiles.attach');
    Route::get('plan/{id}/profiles/{idProfile}/detach', 'ACL\PlanProfilesController@profilesDetach')->name('plan.profiles.detach');
    
   
    
    /* 
    *Rotas para perfis -> permissões
    */

    Route::get('profile/{id}/permissions', 'ACL\ProfilePermissionsController@permissions')->name('profile.permissions');
    Route::get('profile/{id}/permissions/create', 'ACL\ProfilePermissionsController@permissionsAvailable')->name('profile.permissions.available');
    Route::post('profile/{id}/permissions/store', 'ACL\ProfilePermissionsController@permissionsAttach')->name('profile.permissions.attach');
    Route::get('profiles/{id}/permissions/{idPermission}/detach', 'ACL\ProfilePermissionsController@detachPermissionsProfile')->name('profiles.permissions.detach');

  
  /**
   * Produtos x Categorias
   */

  Route::get('products/{id}/categories', 'CategoryProductController@categories')->name('products.categories');
  Route::get('products/{id}/categories/available', 'CategoryProductController@available')->name('products.categories.available');
  Route::post('products/{id}/categories/store', 'CategoryProductController@categoryAttach')->name('products.categories.attach');
  Route::get('products/{id}/categories/{idCategories}/detach', 'CategoryProductController@categoryDetach')->name('products.categories.detach');


    /**
     * Rota para permissões
     */

    Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
    Route::resource('permissions', 'ACL\PermissionController');

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
/**
 * Rotas do site
 */

Route::get('/', 'Site\SiteController@index')->name('site.home');
Route::get('/plan/{url}', 'Site\SiteController@plan')->name('plan.subscription');


/**
 * Autenticação
 */
Auth::routes();



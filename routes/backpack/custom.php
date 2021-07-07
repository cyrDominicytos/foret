<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group(
[
    'namespace'  => 'App\Http\Controllers\Admin\Auth',
    'middleware' => config('backpack.base.web_middleware', 'web'),
    'prefix'     => config('backpack.base.route_prefix'),
],
function () {
    
        // Authentication Routes...
        Route::get('login', 'LoginController@showLoginForm')->name('backpack.auth.login');
        Route::post('login', 'LoginController@login');
        Route::get('logout', 'LoginController@logout')->name('backpack.auth.logout');
        Route::post('logout', 'LoginController@logout');
      
});




Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => [
        'web', 
        backpack_middleware(),
        //'verified'    @TODO
        ],
    //'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    /*
    |--------------------------------------------------------------------------
    | Les routes personnalisées de l'app
    |--------------------------------------------------------------------------
    */
    
    Route::group(['namespace'  => 'App\Http\Controllers\Admin',], function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('backpack.dashboard');
        Route::crud('pay', 'PayCrudController');
        Route::crud('etat', 'EtatCrudController');
        Route::crud('departement', 'DepartementCrudController');
        Route::crud('ville', 'VilleCrudController');
        Route::crud('commune', 'CommuneCrudController');
        Route::crud('poste', 'PosteCrudController');
        Route::crud('espece_produit', 'EspeceProduitCrudController');
        Route::crud('type_produit', 'TypeProduitCrudController');
        Route::crud('parametre', 'ParametreCrudController');
        Route::crud('grade', 'GradeCrudController');
    });
    
}); // this should be the absolute last line of this file
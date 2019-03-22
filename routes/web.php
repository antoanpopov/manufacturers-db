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
    return view('welcome');
});


Route::namespace("Vendors")
    ->name("vendors.")
    ->prefix("vendors")
    ->group(function () {

        Route::namespace("Vali")
            ->name("vali.")
            ->prefix("vali")
            ->group(function () {

                Route::get("/categories",
                    [
                        "as" => "categories",
                        "uses" => "ValiController@categories"
                    ]);


                Route::get("/manufacturers",
                    [
                        "as" => "manufacturers",
                        "uses" => "ValiController@manufacturers"
                    ]);

                Route::any("/search-parameters-by-category-id",
                    [
                        "as" => "search_parameters_by_category_id",
                        "uses" => "ValiController@searchParametersByCategoryId"
                    ]);

                Route::any("/search-by-product-id",
                    [
                        "as" => "search_by_product_id",
                        "uses" => "ValiController@searchByProductId"
                    ]);
            });


    });

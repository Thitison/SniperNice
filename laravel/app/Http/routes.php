<?php
Route::group(['middleware' => ['web']],function() {
Route::get('/add','MulControllers@add');
Route::get('/','MulControllers@index');
Route::post('/add','MulControllers@Mul');

});
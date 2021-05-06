<?php
  // file: routes.php

 
    
 Route::resource('/', 'BooksController@index');
 Route::resource('Book', 'BooksController@store');
 Route::resource('Agregar_Book', 'BooksController@create');
 Route::resource('edit_Book/(:number)', 'BooksController@edit');
 Route::resource('update/(:number)/(:number)', 'BooksController@update');


 Route::resource('list_Author', 'authorController@index');
 Route::resource('Author', 'authorController@store');
 Route::resource('Agregar_Author', 'authorController@create');
 Route::resource('edit_Author/(:number)', 'authorController@edit');
 Route::resource('update_Author/(:string)/(:string)', 'authorController@update');

 Route::resource('list_Publisher', 'publisherController@index');
 Route::resource('Publisher', 'publisherController@store');
 Route::resource('Agregar_Publisher', 'publisherController@create');
 Route::resource('edit_Publisher/(:number)', 'publisherController@edit');
 Route::resource('update_Publisher/(:string)/(:string)', 'publisherController@update');

 Route::resource('Eliminar_Publisher/(:number)', 'publisherController@destroy');
 Route::resource('Eliminar_Book/(:number)', 'BooksController@destroy');
 Route::resource('Eliminar_Author/(:number)', 'authorController@destroy');


 Route::get('inicio', function () { return view('login'); });
 Route::post('login','LoginController@login'); 
 Route::resource('loginFails','LoginController@loginFails'); 
 Route::resource('logout','LoginController@logout'); 
  Route::dispatch();
?>
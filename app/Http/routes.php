<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return App\Book::all();
});


/* Ejemplos de softDeletes
 Buscar un registro que está en papelera*/

Route::get('registro-en-papelera/{id}', function ($id) {
    $book = Book::withTrashed()->find($id);
    return $book;
});

// Enviar un registro a papelera
Route::get('enviar-a-papelera/{id}', function ($id) {
    $book = Book::find($id);
    $book->delete();
    return 'Enviado a papelera';
});
// Restaurar un registro que está en papelera
Route::get('restaurar-registro/{id}', function ($id) {
    $book = Book::withTrashed()->find($id);
    $book->restore();
    return 'Restaurado';
});
// Eliminar un registro de forma permanente
Route::get('eliminar-registro/{id}', function ($id) {
    $book = Book::withTrashed()->find($id);
    $book->forceDelete();
    return 'Eliminado de forma permanente';
});

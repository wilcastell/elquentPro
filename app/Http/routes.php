<?php
use Illuminate\Http\Request;
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
    $books = App\Book::get();
    return view ('destroy', compact('books'));
    //return App\Book::all();
});


Route::delete('destroy', function(Request $request) {
    $ids = $request->get('ids');
    
    if (count($ids)) {
         App\Book::destroy($ids);
    }
    return back();
});
<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/{any}', function () {
//     return response()->file(public_path('dist/index.html'));
// })->where('any', '.*');

Route::get('/', function() {
    return view('index');
});

Route::get('/{project}/{any?}', function ($project) {
    $path = public_path("{$project}/index.html");

    if (file_exists($path)) {
        return response()->file($path);
    }

    abort(404);
})->where(['project' => '[a-zA-Z0-9_-]+', 'any' => '.*']);

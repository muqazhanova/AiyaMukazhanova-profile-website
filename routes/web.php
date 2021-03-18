<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BlogController;

use App\Models\Post;

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/post/create', function(){
    DB::table('post')->insert([
        'title'=>'Web-programming',
        'body'=>'Web development is the work involved in developing a Web site for the Internet or an intranet.'
    ]);
});

Route::get('/post', function(){
    $post = Post::find(1);
    return $post;
});

Route::get('/blog/index', [BlogController::class, 'index']);
Route::get('/blog/create', function(){
    return view('blog.create');
});

Route::post('/blog/create', [BlogController::class, 'store']) -> name('add-post');
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/', 'App\Http\Controllers\ContactController@getHomePage')->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', 'App\Http\Controllers\ContactController@getCategory')->middleware('auth')->name('contact');

Route::name('user.')->group(function(){
    Route::get('/private', 'App\Http\Controllers\ContactController@messagesByUser')->middleware('auth')->name('private');

    Route::get('/login', function () {
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::post('/login', 'App\Http\Controllers\LoginController@login');

    Route::get('/logout', function(){
        Auth::logout();
        return redirect(route('home'));
    })->name('logout');

    Route::get('/registration', function () {
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration', 'App\Http\Controllers\RegisterController@save');
});

// Route::get('/contact/all/{id}', 'App\Http\Controllers\ContactController@showOneMessage')->name('contact-data-one');
// Route::get('/contact/all/{id}/update', 'App\Http\Controllers\ContactController@updateMessage')->name('contact-update');
// Route::post('/contact/all/{id}/update', 'App\Http\Controllers\ContactController@updateMessageSubmit')->name('contact-update-submit');
// Route::get('/contact/all/{id}/delete', 'App\Http\Controllers\ContactController@deleteMessage')->name('contact-delete');
// Route::get('/contact/all', 'App\Http\Controllers\ContactController@allData')->name('contact-data');

Route::get('/message/all/{id}/delete', 'App\Http\Controllers\ContactController@deleteMessage')->middleware('auth')->name('contact-delete');
Route::post('/message/all/{id}/update', 'App\Http\Controllers\ContactController@updateMessageSubmit')->middleware('auth')->name('contact-update-submit');
Route::get('/message/all/{id}/update', 'App\Http\Controllers\ContactController@updateMessage')->middleware('auth')->name('contact-update');
Route::get('/message/all/{id}', 'App\Http\Controllers\ContactController@showOneMessage')->middleware('auth')->name('contact-data-one');
Route::get('/message/all', 'App\Http\Controllers\ContactController@allData')->middleware('auth')->name('contact-data');


// Route::post('/contact/submit', 'App\Http\Controllers\ContactController@submit')->name('contact-form');
Route::post('/message/submit', 'App\Http\Controllers\ContactController@submit')->middleware('auth')->name('contact-form');


Route::post('/apptypeadd', 'App\Http\Controllers\ContactController@applicationTypeAdd')->middleware('auth')->name('applicationType-add');
Route::post('/apptypedelete', 'App\Http\Controllers\ContactController@applicationTypeDelete')->middleware('auth')->name('applicationType-delete');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\PaletteController;
use App\Http\Controllers\CommentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'Homepage');
    Route::get('/random-color', 'RandomColorPage');
    Route::get('/popular', 'PopularColorsPage');
    Route::get('/game', 'ColorGuessingGame');
    Route::get('/contact', 'ContactPage');
    Route::get('/privacy-policy', 'PrivacyPage');

    Route::get('/profile/{user:username}', 'Profile')->middleware(['GuestOrActivated']);
});

Route::controller(ColorController::class)->group(function () {
    Route::get('/color/{slug}', 'ColorPage')->middleware(['RedirectShortColors', 'GuestOrActivated']);

    Route::post('/fav/{slug}', 'FavouriteColor')->middleware(['ShouldBeLoggedIn', 'IsCorrectColor']);
    Route::post('/unfav/{slug}', 'UnFavouriteColor')->middleware(['ShouldBeLoggedIn', 'IsCorrectColor']);
    Route::get('/search', 'Search');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'Login')->middleware(['guest']);
    Route::get('/signup', 'Signup')->middleware(['guest']);

    Route::post('/signup', 'SignupPost')->middleware(['guest']);
    Route::post('/login', 'LoginPost')->middleware(['guest']);
    
    Route::get('/activate', 'ActivatePage');
    Route::post('/activate', 'ActivatePagePost')->middleware(['ShouldBeLoggedIn']);
    Route::post('/resend-email', 'ResendEmail')->middleware(['ShouldBeLoggedIn']);

    Route::post('/logout', 'LogoutAccount')->middleware(['ShouldBeLoggedIn']);
});

Route::controller(CommentsController::class)->group(function () {
    Route::post('/color/{slug}/comment', 'CommentColor')->middleware(['ShouldBeLoggedIn', 'IsCorrectColor']);
});

Route::controller(PaletteController::class)->group(function () {
    Route::get('/palette/create', 'CreatePalettePage');
});
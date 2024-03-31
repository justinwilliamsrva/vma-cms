<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
foreach(config('urls.village') as $name => $url){
    Route::get('/'.$name, function () use ($url) {
        return response('', 409)->header('X-Inertia-Location', $url);
    })->name($name);
}

Route::get('/portal', function () {
    return redirect()->route('dashboard');
})->name('portal');

Route::get('/inquiry', function () {
    // return 'Landing Page';
    return Inertia::render('LandingPage');
})->name('landing-page');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ComputerController;
use App\Http\Controllers\NetworkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServerController;
use App\Models\Network;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    $networks = Network::withCount(['computers', 'servers'])->get();
    return view('dashboard', compact('networks'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes (Networks)
    Route::group(['middleware' => ['can:manage-networks']], function () {
        Route::resource('networks', NetworkController::class);
    });

    // Technician routes (Computers & Servers)
    Route::group(['middleware' => ['can:manage-computers']], function () {
        Route::resource('computers', ComputerController::class);
    });

    Route::group(['middleware' => ['can:manage-servers']], function () {
        Route::resource('servers', ServerController::class);
    });
});

Route::post('/language-switch', function (\Illuminate\Http\Request $request) {
    $language = $request->input('language');
    if (in_array($language, ['en', 'fr'])) {
        session(['locale' => $language]);
        if (auth()->check()) {
            auth()->user()->update(['language' => $language]);
        }
    }
    return back();
})->name('language.switch');

require __DIR__.'/auth.php';

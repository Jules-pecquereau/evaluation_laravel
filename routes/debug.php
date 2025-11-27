<?php

use App\Models\Network;
use Illuminate\Support\Facades\Route;

Route::get('/debug-networks', function () {
    return Network::all();
});

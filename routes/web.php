<?php

use Sienekib\Proto\Routing\Anotation\Route;


Route::get('/', [App\Http\Controllers\AppController::class, 'index']);
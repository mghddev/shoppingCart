<?php

use App\Constant\RouteName;
use App\Http\Controllers\API\HttpApiCalculatePrice;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'price'], function() {
   Route::post('/', HttpApiCalculatePrice::class)->name(RouteName::CALCULATE_PRICE);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyApiController;


Route::prefix('v1')->group(function () {
    Route::apiResource('companies', CompanyApiController::class)
        ->names('api.companies');
});
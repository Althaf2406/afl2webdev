<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ModelController;

Route::get('/', [PageController::class, 'index']);

Route::get('/company-overview', [PageController::class, 'company_overview']);

Route::get('/index', [PageController::class, 'index']);

Route::get('/corporate-governance', [PageController::class, 'corporate_governance']);

Route::get('/mining-assets', [PageController::class, 'mining_assets']);

Route::get('/project-data', [PageController::class, 'project_data']);

Route::get('/investor-relation', [PageController::class, 'investor_relation']);

Route::get('/product', [ModelController::class, 'product']);

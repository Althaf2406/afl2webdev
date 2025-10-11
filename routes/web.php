<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/corporate-governance', function () {
    return view('corporate_governance');
});

Route::get('/mining-assets', function () {
    return view('mining_assets');
});

Route::get('/project-data', function () {
    return view('project_data');
});

Route::get('/investor-relation', function () {
    return view('investor_relation');
});

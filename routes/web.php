<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('Dashboard.dashboard');
});

Route::get('/getChartData', 'App\Http\Controllers\ChartData@index')->name('getChartData');
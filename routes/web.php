<?php 

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index']);

Route::middleware('auth')->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware('auth')->resource('alumni', AlumniController::class)->parameters([
    'alumni' => 'alumni' // This tells Laravel to use 'alumni' as parameter name
]);;

// Route::get('export', function () {
//     $filePath = public_path('tracer-study.xlsx');
//     Excel::import(new AlumniImport, $filePath);

//     return 'Import completed.';
// });

// Route::get('linear', function () {
//     $filePath = public_path('tracer-study-linearitas.xlsx');
//     Excel::import(new AlumniImport, $filePath);

//     return 'Import completed.';
// });

Route::get('clear', function(){
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
});

Auth::routes();
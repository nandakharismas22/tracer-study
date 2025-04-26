<?php 

use App\Http\Controllers\LandingPageController;
use App\Imports\AlumniImport;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index']);

// Route::get('export', function () {
//     $filePath = public_path('tracer-study.xlsx');
//     Excel::import(new AlumniImport, $filePath);

//     return 'Import completed.';
// });

Route::get('linear', function () {
    $filePath = public_path('tracer-study-linearitas.xlsx');
    Excel::import(new AlumniImport, $filePath);

    return 'Import completed.';
});

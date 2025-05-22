<?php 

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingPageController;
use App\Imports\AlumniImport;
use App\Models\Perusahaan;
use App\Models\Universitas;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [LandingPageController::class, 'index'])->name('index');

Route::middleware('auth')->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('alumni', AlumniController::class)->parameters([
    'alumni' => 'alumni' // This tells Laravel to use 'alumni' as parameter name
]);;

Route::patch('/alumni/{alumni}/approve', [AlumniController::class, 'approve'])->name('alumni.approve');
Route::patch('/alumni/{alumni}/reject', [AlumniController::class, 'reject'])->name('alumni.reject');

Route::get('kuesioner', function(){
        $universitasList = Universitas::all();
        $perusahaanList = Perusahaan::all();
        return view('kuesioner', compact('universitasList', 'perusahaanList'));
})->name('kuesioner');

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

Route::get('clear', function(){
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
});

Auth::routes();

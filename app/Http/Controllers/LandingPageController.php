<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index(){
        $alumni = Alumni::count();
        $berkuliah = Alumni::whereHas('universitas')
        ->count();
        $bekerja = Alumni::whereHas('perusahaan')
        ->count();
        $wirausaha = Alumni::whereHas('perusahaan', function ($query) {
            $query->where('wirausaha', 1);
        })->count();

        $linear['universitas'] = Alumni::whereHas('universitas', function($query){
            $query->where('linear', 1);
        })
        ->count();
        $linear['perusahaan'] = Alumni::whereHas('perusahaan', function($query){
            $query->where('linear', 1);
        })
        ->count();

        $tidakLinear['universitas'] = Alumni::whereHas('universitas', function($query){
            $query->where('linear', 0);
        })
        ->count();
        $tidakLinear['perusahaan'] = Alumni::whereHas('perusahaan', function($query){
            $query->where('linear', 0);
        })
        ->count();

        return view('index', compact(
            'alumni',
            'berkuliah',
            'bekerja',
            'wirausaha',
            'linear',
            'tidakLinear',
        ));
    }

    public function api(){
        $cari = request('cari');
        $alumni = [];

        if($cari){
            $alumni = Alumni::orWhere('nama', 'LIKE', "%$cari%")
            ->orWhere(function ($query) use ($cari) {
                $query->whereHas('pengguna', function ($q) use ($cari) {
                    $q->where('username', 'LIKE', "%$cari%");
                });
            })
            ->orWhere(function ($query) use ($cari) {
                $query->whereHas('universitas', function ($q) use ($cari) {
                    $q->where('nama', 'LIKE', "%$cari%");
                });
            })
            ->orWhere(function ($query) use ($cari) {
                $query->whereHas('perusahaan', function ($q) use ($cari) {
                    $q->where('nama', 'LIKE', "%$cari%");
                });
            })
            ->with('pengguna', 'perusahaan', 'universitas')
            ->get();
        }

        return response()->json($alumni);
    }
}

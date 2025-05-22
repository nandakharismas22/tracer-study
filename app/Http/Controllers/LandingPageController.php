<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index(){
        $alumni = Alumni::where('status', 'disetujui')
        ->count();
        $berkuliah = Alumni::where('status', 'disetujui')
        ->whereHas('universitas')
        ->count();
        $bekerja = Alumni::where('status', 'disetujui')
        ->whereHas('perusahaan')
        ->count();
        $wirausaha = Alumni::where('status', 'disetujui')
        ->whereHas('perusahaan', function ($query) {
            $query->where('wirausaha', 1);
        })->count();

        $linear['universitas'] = Alumni::where('status', 'disetujui')
        ->whereHas('universitas', function($query){
            $query->where('linear', 1);
        })
        ->count();
        $linear['perusahaan'] = Alumni::where('status', 'disetujui')
        ->whereHas('perusahaan', function($query){
            $query->where('linear', 1);
        })
        ->count();

        $tidakLinear['universitas'] = Alumni::where('status', 'disetujui')
        ->whereHas('universitas', function($query){
            $query->where('linear', 0);
        })
        ->count();
        $tidakLinear['perusahaan'] = Alumni::where('status', 'disetujui')
        ->whereHas('perusahaan', function($query){
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

    public function api()
    {
        $cari = request('cari');
        $alumni = [];

        if ($cari) {
            $alumni = Alumni::where(function($query) use ($cari) {
                    $query->where('nama', 'LIKE', "%$cari%")
                        ->orWhereHas('pengguna', function ($q) use ($cari) {
                            $q->where('username', 'LIKE', "%$cari%");
                        })
                        ->orWhereHas('universitas', function ($q) use ($cari) {
                            $q->where('nama', 'LIKE', "%$cari%");
                        })
                        ->orWhereHas('perusahaan', function ($q) use ($cari) {
                            $q->where('nama', 'LIKE', "%$cari%");
                        });
                })
                ->where('status', 'disetujui')
                ->with('pengguna', 'perusahaan', 'universitas')
                ->get();
        }

        return response()->json($alumni);
    }
}

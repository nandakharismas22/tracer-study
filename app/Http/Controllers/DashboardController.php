<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->username != 'admin'){
            $alumni = Alumni::where('pengguna_uuid', Auth::user()->uuid)
            ->first();
            return view('dashboard.show', compact('alumni'));
        }

        $alumni = Alumni::latest() 
        ->paginate(10);

        return view('dashboard.index', compact('alumni'));
    }
}

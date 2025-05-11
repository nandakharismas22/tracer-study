<?php 

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\User;
use App\Models\Universitas;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AlumniController extends Controller
{
    public function create()
    {
        $universitasList = Universitas::all();
        $perusahaanList = Perusahaan::all();
        return view('dashboard.create', compact('universitasList', 'perusahaanList'));
    }

    public function store(Request $request)
{
    try {
        $request->validate([
            'username' => 'required|unique:pengguna,username',
            'password' => 'required|min:6',
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'universitas' => 'nullable|array',
            'perusahaan' => 'nullable|array',
        ]);

        // Create pengguna first
        $pengguna = User::create([
            'uuid' => Str::uuid(),
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Create alumni
        $alumni = Alumni::create([
            'uuid' => Str::uuid(),
            'pengguna_uuid' => $pengguna->uuid,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        // Attach universitas if any
        if ($request->has('universitas')) {
            $universitasData = [];
            foreach ($request->universitas as $index => $univId) {
                if ($univId) {
                    $universitasData[$univId] = [
                        'jurusan' => $request->jurusan[$index] ?? null,
                        'linear' => $request->linear_univ[$index] ?? 0
                    ];
                }
            }
            $alumni->universitas()->attach($universitasData);
        }

        // Attach perusahaan if any
        if ($request->has('perusahaan')) {
            $perusahaanData = [];
            foreach ($request->perusahaan as $index => $perusahaanId) {
                if ($perusahaanId) {
                    $perusahaanData[$perusahaanId] = [
                        'wirausaha' => $request->wirausaha[$index] ?? 0,
                        'linear' => $request->linear_perusahaan[$index] ?? 0
                    ];
                }
            }
            $alumni->perusahaan()->attach($perusahaanData);
        }

        if (Auth::user()) {
            return redirect()->route('dashboard')->with([
                'alertType' => 'success',
                'alertMessage' => 'Data alumni berhasil disimpan!'
            ]);
        }

        return redirect()->route('index')->with([
            'alertType' => 'success',
            'alertMessage' => 'Terima kasih telah mengisi kuesioner alumni!'
        ]);

    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with([
            'alertType' => 'error',
            'alertMessage' => 'Gagal menyimpan data: ' . $e->getMessage()
        ]);
    }
}

    public function show(Alumni $alumni)
    {
        return view('dashboard.show', compact('alumni'));
    }

    public function edit(Alumni $alumni)
    {
        $universitasList = Universitas::all();
        $perusahaanList = Perusahaan::all();
        $selectedUniv = $alumni->universitas->pluck('uuid')->toArray();
        $selectedPerusahaan = $alumni->perusahaan->pluck('uuid')->toArray();
        
        return view('dashboard.edit', compact('alumni', 'universitasList', 'perusahaanList', 'selectedUniv', 'selectedPerusahaan'));
    }

    public function update(Request $request, Alumni $alumni)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'universitas' => 'nullable|array',
            'universitas.*' => 'nullable|exists:universitas,uuid',
            'jurusan' => 'nullable|array',
            'linear_univ' => 'nullable|array',
            'perusahaan' => 'nullable|array',
            'perusahaan.*' => 'nullable|exists:perusahaan,uuid',
            'wirausaha' => 'nullable|array',
            'linear_perusahaan' => 'nullable|array',
        ]);

        // Update basic alumni info
        $alumni->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        // Handle universitas data
        $universitasData = [];
        if ($request->has('universitas')) {
            foreach ($request->universitas as $index => $univId) {
                if (!empty($univId)) {
                    $universitasData[$univId] = [
                        'jurusan' => $request->jurusan[$index] ?? null,
                        'linear' => $request->linear_univ[$index] ?? 0
                    ];
                }
            }
        }
        $alumni->universitas()->sync($universitasData);

        // Handle perusahaan data
        $perusahaanData = [];
        if ($request->has('perusahaan')) {
            foreach ($request->perusahaan as $index => $perusahaanId) {
                if (!empty($perusahaanId)) {
                    $perusahaanData[$perusahaanId] = [
                        'wirausaha' => $request->wirausaha[$index] ?? 0,
                        'linear' => $request->linear_perusahaan[$index] ?? 0
                    ];
                }
            }
        }
        $alumni->perusahaan()->sync($perusahaanData);

        return redirect()->route('dashboard')->with('success', 'Alumni updated successfully');
    }

    public function destroy(Alumni $alumni)
    {
        // Delete pengguna first to maintain referential integrity
        $pengguna = $alumni->pengguna;
        $alumni->delete();
        $pengguna->delete();

        return redirect()->route('dashboard')->with('success', 'Alumni deleted successfully');
    }
}
@extends('layouts.dashboard.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Profil Alumni</h4>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NISN/Username</label>
                            <p class="form-control-static">{{ $alumni->pengguna->username }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <p class="form-control-static">{{ $alumni->nama }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <p class="form-control-static">
                                {{ $alumni->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Universitas Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <h5 class="mb-3">Pendidikan Lanjut</h5>
                        @if($alumni->universitas->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Universitas</th>
                                            <th>Jurusan</th>
                                            <th>Linear dengan Pendidikan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($alumni->universitas as $univ)
                                        <tr>
                                            <td>{{ $univ->nama }}</td>
                                            <td>{{ $univ->pivot->jurusan ?? '-' }}</td>
                                            <td>{{ $univ->pivot->linear ? 'Ya' : 'Tidak' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                Tidak ada data universitas
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Perusahaan Section -->
                <div class="row mt-4">
                    <div class="col-12">
                        <h5 class="mb-3">Pengalaman Kerja</h5>
                        @if($alumni->perusahaan->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Perusahaan</th>
                                            <th>Wirausaha</th>
                                            <th>Linear dengan Pendidikan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($alumni->perusahaan as $perusahaan)
                                        <tr>
                                            <td>{{ $perusahaan->nama }}</td>
                                            <td>{{ $perusahaan->pivot->wirausaha ? 'Ya' : 'Tidak' }}</td>
                                            <td>{{ $perusahaan->pivot->linear ? 'Ya' : 'Tidak' }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                Tidak ada data perusahaan
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('alumni.edit', $alumni->uuid) }}" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit Data
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
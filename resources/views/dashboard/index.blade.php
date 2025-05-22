@extends('layouts.dashboard.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Data Alumni</h4>

                <div class="d-flex mb-3">
                    <a href="{{ route('alumni.create') }}" class="btn btn-primary w-100 me-3">Tambah Alumni</a>
                    <a href="#" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#shareModal">Bagikan Kuesioner</a>
                </div>
                <div class="table-responsive my-4">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th scope="col">UNIVERSITAS</th>
                                <th scope="col">PERUSAHAAN</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumni as $item)
                            <tr>
                                <td>{{ $item->pengguna->username }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>
                                    <ul>
                                        @if($item->universitas->count() > 0)
                                        @foreach ($item->universitas as $univ)
                                        <li>{{ $univ->nama }}
                                            {{ $univ->pivot->jurusan ? '(' . $univ->pivot->jurusan . ')' : ''}}</li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </td>
                                <td>
                                    @if($item->perusahaan->count() > 0)
                                    <ul>
                                        @foreach ($item->perusahaan as $perusahaan)
                                        <li>{{ $perusahaan->nama }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </td>
                                <td>
                                    @switch($item->status)
                                        @case('proses')
                                            <span class="badge bg-warning">Proses</span>
                                            @break
                                        @case('disetujui')
                                            <span class="badge bg-success">Disetujui</span>
                                            @break
                                        @default
                                            <span class="badge bg-danger">Ditolak</span>
                                    @endswitch
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @if($item->status != 'disetujui')
                                        <form action="{{ route('alumni.approve', $item->uuid) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm" 
                                                >
                                                Setujui
                                            </button>
                                        </form>
                                        @endif
                                        
                                        @if($item->status != 'ditolak')
                                        <form action="{{ route('alumni.reject', $item->uuid) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Tolak
                                            </button>
                                        </form>
                                        @endif
                                        
                                        <a href="{{ route('alumni.edit', $item->uuid) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('alumni.destroy', $item->uuid) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $alumni->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
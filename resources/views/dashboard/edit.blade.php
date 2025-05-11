@extends('layouts.dashboard.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Edit Alumni</h4>

                <form action="{{ route('alumni.update', $alumni->uuid) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }}
                        @endforeach
                    </div>
                    @endif

                    <div class="form-group mb-3">
                        <label for="username">Username/NISN</label>
                        <input type="text" class="form-control" id="username" value="{{ $alumni->pengguna->username }}"
                            readonly>
                        <small class="text-muted">Username tidak dapat diubah</small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ old('nama', $alumni->nama) }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="L"
                                {{ old('jenis_kelamin', $alumni->jenis_kelamin) == 'L' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P"
                                {{ old('jenis_kelamin', $alumni->jenis_kelamin) == 'P' ? 'checked' : '' }}>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Pendidikan Lanjut (Universitas)</label>
                        <div id="universitas-container">
                            @forelse($alumni->universitas as $index => $univ)
                            <div class="universitas-item mb-3">
                                <select class="form-control select-universitas" name="universitas[]">
                                    <option value="">Pilih Universitas</option>
                                    @foreach($universitasList as $u)
                                    <option value="{{ $u->uuid }}" {{ $univ->uuid == $u->uuid ? 'selected' : '' }}>
                                        {{ $u->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="mt-2">
                                    <label>Jurusan</label>
                                    <input type="text" class="form-control" name="jurusan[]"
                                        value="{{ old("jurusan.$index", $univ->pivot->jurusan) }}">
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="linear_univ[]" value="1"
                                        {{ $univ->pivot->linear ? 'checked' : '' }}>
                                    <input type="hidden" name="linear_univ[]" value="0"> <!-- Fallback for unchecked -->
                                    <label class="form-check-label">Linear dengan pendidikan sebelumnya</label>
                                </div>
                                <button type="button"
                                    class="btn btn-danger btn-sm mt-2 remove-universitas">Hapus</button>
                            </div>
                            @empty
                            <div class="universitas-item mb-3">
                                <select class="form-control select-universitas" name="universitas[]">
                                    <option value="">Pilih Universitas</option>
                                    @foreach($universitasList as $univ)
                                    <option value="{{ $univ->uuid }}">{{ $univ->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-2">
                                    <label>Jurusan</label>
                                    <input type="text" class="form-control" name="jurusan[]">
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="linear_univ[]" value="1">
                                    <input type="hidden" name="linear_univ[]" value="0">
                                    <label class="form-check-label">Linear dengan pendidikan sebelumnya</label>
                                </div>
                                <button type="button"
                                    class="btn btn-danger btn-sm mt-2 remove-universitas">Hapus</button>
                            </div>
                            @endforelse
                        </div>
                        <button type="button" class="btn btn-secondary btn-sm" id="add-universitas">Tambah
                            Universitas</button>
                    </div>

                    <div class="form-group mb-3">
                        <label>Pengalaman Kerja/Perusahaan</label>
                        <div id="perusahaan-container">
                            @forelse($alumni->perusahaan as $index => $perusahaan)
                            <div class="perusahaan-item mb-3">
                                <select class="form-control select-perusahaan" name="perusahaan[]">
                                    <option value="">Pilih Perusahaan</option>
                                    @foreach($perusahaanList as $p)
                                    <option value="{{ $p->uuid }}"
                                        {{ $perusahaan->uuid == $p->uuid ? 'selected' : '' }}>
                                        {{ $p->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="wirausaha[]" value="1"
                                        {{ $perusahaan->pivot->wirausaha ? 'checked' : '' }}>
                                    <input type="hidden" name="wirausaha[]" value="0">
                                    <label class="form-check-label">Wirausaha</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="linear_perusahaan[]" value="1"
                                        {{ $perusahaan->pivot->linear ? 'checked' : '' }}>
                                    <input type="hidden" name="linear_perusahaan[]" value="0">
                                    <label class="form-check-label">Linear dengan pendidikan</label>
                                </div>
                                <button type="button"
                                    class="btn btn-danger btn-sm mt-2 remove-perusahaan">Hapus</button>
                            </div>
                            @empty
                            <div class="perusahaan-item mb-3">
                                <select class="form-control select-perusahaan" name="perusahaan[]">
                                    <option value="">Pilih Perusahaan</option>
                                    @foreach($perusahaanList as $perusahaan)
                                    <option value="{{ $perusahaan->uuid }}">{{ $perusahaan->nama }}</option>
                                    @endforeach
                                </select>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="wirausaha[]" value="1">
                                    <input type="hidden" name="wirausaha[]" value="0">
                                    <label class="form-check-label">Wirausaha</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="linear_perusahaan[]"
                                        value="1">
                                    <input type="hidden" name="linear_perusahaan[]" value="0">
                                    <label class="form-check-label">Linear dengan pendidikan</label>
                                </div>
                                <button type="button"
                                    class="btn btn-danger btn-sm mt-2 remove-perusahaan">Hapus</button>
                            </div>
                            @endforelse
                        </div>
                        <button type="button" class="btn btn-secondary btn-sm" id="add-perusahaan">Tambah
                            Perusahaan</button>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // Add universitas field
        $('#add-universitas').click(function () {
            const newItem = $('.universitas-item').first().clone();
            newItem.find('input[type="text"]').val('');
            newItem.find('select').val('');
            newItem.find('input[type="checkbox"]').prop('checked', false);
            newItem.find('input[type="hidden"]').val('0');
            $('#universitas-container').append(newItem);
        });

        // Add perusahaan field
        $('#add-perusahaan').click(function () {
            const newItem = $('.perusahaan-item').first().clone();
            newItem.find('select').val('');
            newItem.find('input[type="checkbox"]').prop('checked', false);
            newItem.find('input[type="hidden"]').val('0');
            $('#perusahaan-container').append(newItem);
        });

        // Remove universitas field
        $(document).on('click', '.remove-universitas', function () {
            $(this).closest('.universitas-item').remove();
        });

        // Remove perusahaan field
        $(document).on('click', '.remove-perusahaan', function () {
            $(this).closest('.perusahaan-item').remove();
        });
    });

</script>
@endpush

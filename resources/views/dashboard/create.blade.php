@extends('layouts.dashboard.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambah Alumni</h4>

                <form action="{{ route('alumni.store') }}" method="POST">
                    @csrf

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }}
                        @endforeach
                    </div>
                    @endif

                    <input type="hidden" class="form-control" id="password" name="password" value="smenda123">

                    <div class="form-group mb-3">
                        <label for="username">Username/NISN</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label>Jenis Kelamin</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="L"
                                {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="laki">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P"
                                {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}>
                            <label class="form-check-label" for="perempuan">Perempuan</label>
                        </div>
                        @error('jenis_kelamin')
                            <span class="text-danger d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Pendidikan Lanjut (Universitas)</label>
                        <div id="universitas-container">
                            <div class="universitas-item mb-3">
                                <select class="form-control select-universitas" name="universitas[]">
                                    <option value="">Pilih Universitas</option>
                                    @foreach($universitasList as $univ)
                                    <option value="{{ $univ->uuid }}" {{ old('universitas.0') == $univ->uuid ? 'selected' : '' }}>
                                        {{ $univ->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('universitas.0')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mt-2">
                                    <label>Jurusan</label>
                                    <input type="text" class="form-control" name="jurusan[]" value="{{ old('jurusan.0') }}">
                                    @error('jurusan.0')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="linear_univ[]" value="1" {{ old('linear_univ.0') == '1' ? 'checked' : '' }}>
                                    <input type="hidden" name="linear_univ[]" value="0">
                                    <label class="form-check-label">Linear dengan pendidikan sebelumnya</label>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm mt-2 remove-universitas">Hapus</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary btn-sm" id="add-universitas">Tambah Universitas</button>
                    </div>

                    <div class="form-group mb-3">
                        <label>Pengalaman Kerja/Perusahaan</label>
                        <div id="perusahaan-container">
                            <div class="perusahaan-item mb-3">
                                <select class="form-control select-perusahaan" name="perusahaan[]">
                                    <option value="">Pilih Perusahaan</option>
                                    @foreach($perusahaanList as $perusahaan)
                                    <option value="{{ $perusahaan->uuid }}" {{ old('perusahaan.0') == $perusahaan->uuid ? 'selected' : '' }}>
                                        {{ $perusahaan->nama }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('perusahaan.0')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="wirausaha[]" value="1" {{ old('wirausaha.0') == '1' ? 'checked' : '' }}>
                                    <input type="hidden" name="wirausaha[]" value="0">
                                    <label class="form-check-label">Wirausaha</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="linear_perusahaan[]" value="1" {{ old('linear_perusahaan.0') == '1' ? 'checked' : '' }}>
                                    <input type="hidden" name="linear_perusahaan[]" value="0">
                                    <label class="form-check-label">Linear dengan pendidikan</label>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm mt-2 remove-perusahaan">Hapus</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary btn-sm" id="add-perusahaan">Tambah Perusahaan</button>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('alumni.index') }}" class="btn btn-secondary">Kembali</a>
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
            const count = $('.universitas-item').length;
            const newItem = $('.universitas-item').first().clone();
            newItem.find('input[type="text"]').val('');
            newItem.find('select').val('');
            newItem.find('input[type="checkbox"]').prop('checked', false);
            newItem.find('input[type="hidden"]').val('0');
            
            // Update name attributes with new index
            newItem.find('select').attr('name', `universitas[${count}]`);
            newItem.find('input[type="text"]').attr('name', `jurusan[${count}]`);
            newItem.find('input[type="checkbox"]').attr('name', `linear_univ[${count}]`);
            newItem.find('input[type="hidden"]').attr('name', `linear_univ[${count}]`);
            
            // Clear error messages
            newItem.find('.text-danger').remove();
            
            $('#universitas-container').append(newItem);
        });

        // Add perusahaan field
        $('#add-perusahaan').click(function () {
            const count = $('.perusahaan-item').length;
            const newItem = $('.perusahaan-item').first().clone();
            newItem.find('select').val('');
            newItem.find('input[type="checkbox"]').prop('checked', false);
            newItem.find('input[type="hidden"]').val('0');
            
            // Update name attributes with new index
            newItem.find('select').attr('name', `perusahaan[${count}]`);
            newItem.find('input[type="checkbox"][value="1"]').attr('name', `wirausaha[${count}]`);
            newItem.find('input[type="hidden"]').attr('name', `wirausaha[${count}]`);
            newItem.find('input[type="checkbox"][value="1"]').last().attr('name', `linear_perusahaan[${count}]`);
            newItem.find('input[type="hidden"]').last().attr('name', `linear_perusahaan[${count}]`);
            
            // Clear error messages
            newItem.find('.text-danger').remove();
            
            $('#perusahaan-container').append(newItem);
        });

        // Remove universitas field
        $(document).on('click', '.remove-universitas', function() {
            if($('.universitas-item').length > 1) {
                $(this).closest('.universitas-item').remove();
                // Reindex remaining items
                $('.universitas-item').each(function(index) {
                    $(this).find('select').attr('name', `universitas[${index}]`);
                    $(this).find('input[type="text"]').attr('name', `jurusan[${index}]`);
                    $(this).find('input[type="checkbox"]').attr('name', `linear_univ[${index}]`);
                    $(this).find('input[type="hidden"]').attr('name', `linear_univ[${index}]`);
                });
            } 
        });

        // Remove perusahaan field
        $(document).on('click', '.remove-perusahaan', function() {
            if($('.perusahaan-item').length > 1) {
                $(this).closest('.perusahaan-item').remove();
                // Reindex remaining items
                $('.perusahaan-item').each(function(index) {
                    $(this).find('select').attr('name', `perusahaan[${index}]`);
                    $(this).find('input[type="checkbox"][value="1"]').attr('name', `wirausaha[${index}]`);
                    $(this).find('input[type="hidden"]').attr('name', `wirausaha[${index}]`);
                    $(this).find('input[type="checkbox"][value="1"]').last().attr('name', `linear_perusahaan[${index}]`);
                    $(this).find('input[type="hidden"]').last().attr('name', `linear_perusahaan[${index}]`);
                });
            } 
        });
    });
</script>
@endpush
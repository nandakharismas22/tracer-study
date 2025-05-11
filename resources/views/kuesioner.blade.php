@include('layouts.dashboard.head')

<!-- Banner Section -->
<section class="bg-primary text-white py-4" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-2 text-center">
                <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" 
                     alt="SMK 2 Buduran Logo" 
                     class=" rounded-circle border border-3 border-white" 
                     style="object-fit: cover;" width="100" height="100">
            </div>
            <div class="col-md-10">
                <h1 class="mb-1">Kuesioner Alumni</h1>
                <h3 class="mb-0">SMK 2 Buduran</h3>
                <p class="mb-0 mt-2">Membangun Jejaring Alumni yang Berkualitas</p>
            </div>
        </div>
    </div>
</section>

<!-- Main Form Section -->
<section class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow">
                <div class="card-header bg-light">
                    <h4 class="mt-2 mb-0">Formulir Data Alumni</h4>
                    <p class="text-muted mb-0">Silakan isi data dengan sebenar-benarnya</p>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('alumni.store') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <h5 class="alert-heading">Terjadi kesalahan!</h5>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <input type="hidden" class="form-control" id="password" name="password" value="smenda123">

                        <!-- Personal Information Section -->
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2 mb-3">Data Pribadi</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="username" class="form-label">Username/NISN <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
                                        @error('username')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                                        @error('nama')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="form-label">Jenis Kelamin <span class="text-danger">*</span></label><br>
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
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Education Section -->
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2 mb-3">Pendidikan Lanjut (Universitas)</h5>
                            <div id="universitas-container">
                                <div class="universitas-item card mb-3 p-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Universitas</label>
                                        <select class="form-control select-universitas" name="universitas[]">
                                            <option value="">Pilih Universitas</option>
                                            @foreach($universitasList as $univ)
                                            <option value="{{ $univ->uuid }}" {{ old('universitas.0') == $univ->uuid ? 'selected' : '' }}>
                                                {{ $univ->nama }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('universitas.0')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label">Jurusan</label>
                                        <input type="text" class="form-control" name="jurusan[]" value="{{ old('jurusan.0') }}">
                                        @error('jurusan.0')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="linear_univ[]" value="1" {{ old('linear_univ.0') == '1' ? 'checked' : '' }}>
                                        <input type="hidden" name="linear_univ[]" value="0">
                                        <label class="form-check-label">Linear dengan pendidikan sebelumnya</label>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger btn-sm remove-universitas">Hapus</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm" id="add-universitas">
                                <i class="fas fa-plus"></i> Tambah Universitas
                            </button>
                        </div>

                        <!-- Work Experience Section -->
                        <div class="mb-4">
                            <h5 class="border-bottom pb-2 mb-3">Pengalaman Kerja/Perusahaan</h5>
                            <div id="perusahaan-container">
                                <div class="perusahaan-item card mb-3 p-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Perusahaan</label>
                                        <select class="form-control select-perusahaan" name="perusahaan[]">
                                            <option value="">Pilih Perusahaan</option>
                                            @foreach($perusahaanList as $perusahaan)
                                            <option value="{{ $perusahaan->uuid }}" {{ old('perusahaan.0') == $perusahaan->uuid ? 'selected' : '' }}>
                                                {{ $perusahaan->nama }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('perusahaan.0')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="wirausaha[]" value="1" {{ old('wirausaha.0') == '1' ? 'checked' : '' }}>
                                        <input type="hidden" name="wirausaha[]" value="0">
                                        <label class="form-check-label">Wirausaha</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="linear_perusahaan[]" value="1" {{ old('linear_perusahaan.0') == '1' ? 'checked' : '' }}>
                                        <input type="hidden" name="linear_perusahaan[]" value="0">
                                        <label class="form-check-label">Linear dengan pendidikan</label>
                                    </div>
                                    <button type="button" class="btn btn-outline-danger btn-sm remove-perusahaan">Hapus</button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-outline-primary btn-sm" id="add-perusahaan">
                                <i class="fas fa-plus"></i> Tambah Perusahaan
                            </button>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-save"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layouts.dashboard.tail')

<!-- JavaScript for Dynamic Fields -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add Universitas Field
    document.getElementById('add-universitas').addEventListener('click', function() {
        const container = document.getElementById('universitas-container');
        const index = container.children.length;
        const newItem = document.createElement('div');
        newItem.className = 'universitas-item card mb-3 p-3';
        newItem.innerHTML = `
            <div class="form-group mb-3">
                <label class="form-label">Universitas</label>
                <select class="form-control select-universitas" name="universitas[]">
                    <option value="">Pilih Universitas</option>
                    @foreach($universitasList as $univ)
                    <option value="{{ $univ->uuid }}">{{ $univ->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Jurusan</label>
                <input type="text" class="form-control" name="jurusan[]">
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="linear_univ[]" value="1">
                <input type="hidden" name="linear_univ[]" value="0">
                <label class="form-check-label">Linear dengan pendidikan sebelumnya</label>
            </div>
            <button type="button" class="btn btn-outline-danger btn-sm remove-universitas">Hapus</button>
        `;
        container.appendChild(newItem);
    });

    // Add Perusahaan Field
    document.getElementById('add-perusahaan').addEventListener('click', function() {
        const container = document.getElementById('perusahaan-container');
        const index = container.children.length;
        const newItem = document.createElement('div');
        newItem.className = 'perusahaan-item card mb-3 p-3';
        newItem.innerHTML = `
            <div class="form-group mb-3">
                <label class="form-label">Perusahaan</label>
                <select class="form-control select-perusahaan" name="perusahaan[]">
                    <option value="">Pilih Perusahaan</option>
                    @foreach($perusahaanList as $perusahaan)
                    <option value="{{ $perusahaan->uuid }}">{{ $perusahaan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="wirausaha[]" value="1">
                <input type="hidden" name="wirausaha[]" value="0">
                <label class="form-check-label">Wirausaha</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" name="linear_perusahaan[]" value="1">
                <input type="hidden" name="linear_perusahaan[]" value="0">
                <label class="form-check-label">Linear dengan pendidikan</label>
            </div>
            <button type="button" class="btn btn-outline-danger btn-sm remove-perusahaan">Hapus</button>
        `;
        container.appendChild(newItem);
    });

    // Remove Field Handlers
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-universitas')) {
            if (document.querySelectorAll('.universitas-item').length > 1) {
                e.target.closest('.universitas-item').remove();
            } else {
                alert('Anda harus memiliki setidaknya satu data universitas');
            }
        }
        
        if (e.target.classList.contains('remove-perusahaan')) {
            if (document.querySelectorAll('.perusahaan-item').length > 1) {
                e.target.closest('.perusahaan-item').remove();
            } else {
                alert('Anda harus memiliki setidaknya satu data perusahaan');
            }
        }
    });
});
</script>

<style>
    .card {
        border-radius: 10px;
    }
    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }
    .form-control, .form-select {
        border-radius: 5px;
    }
    .btn-lg {
        border-radius: 5px;
    }
    .universitas-item, .perusahaan-item {
        border-left: 4px solid #0d6efd;
    }
    .remove-universitas, .remove-perusahaan {
        width: 100px;
    }
</style>
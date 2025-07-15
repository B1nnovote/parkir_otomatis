<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Petugas</title>

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        .btn-label {
            pointer-events: none;
            font-weight: 500;
        }
    </style>
</head>

<body>
    @include('layouts.part.sidebar')
    <section id="content">
        @include('layouts.part.navbar')

        <div class="container col-10 mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="btn btn-sm btn-label-primary rounded-pill px-3 py-2 btn-label" style="font-size:30px;">
                    Edit Petugas
                </span>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header text-white fw-semibold" style="background-color: #696cff">
                    Formulir Edit Data Petugas
                </div>
                <div class="card-body p-4">
                   <form action="{{ route('petugas.update', $petugas->id) }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- Pesan error global --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Nama --}}
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $petugas->name) }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Email --}}
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email"
            class="form-control @error('email') is-invalid @enderror"
            value="{{ old('email', $petugas->email) }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Foto --}}
    <div class="mb-3">
        <label class="form-label">Foto (opsional)</label>
        <input type="file" name="foto"
            class="form-control @error('foto') is-invalid @enderror">
        @error('foto')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if ($petugas->foto)
            <small class="text-muted">Foto saat ini:
                <a href="{{ asset('storage/' . $petugas->foto) }}" target="_blank">Lihat</a>
            </small>
        @endif
    </div>

    {{-- Tombol --}}
    <div class="d-flex justify-content-between">
        <a href="{{ route('petugas.index') }}" class="btn btn-outline-secondary">
            <i class="bx bx-arrow-back"></i> Kembali
        </a>
        <button type="submit" class="btn" style="background-color: #696cff; color:white;">
            <i class="bx bx-save"></i> Simpan
        </button>
    </div>
</form>

                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

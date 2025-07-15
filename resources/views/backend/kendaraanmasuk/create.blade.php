<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Kendaraan Masuk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    body {
      background-color: #f5f6fa;
    }
    .form-label {
      font-weight: 600;
    }
    .form-section {
      max-width: 550px;
      margin: 40px auto;
    }
    .card {
      border-radius: 0.75rem;
    }
    .card-header {
      background-color: #696cff;
      color: white;
      border-top-left-radius: 0.75rem;
      border-top-right-radius: 0.75rem;
      font-size: 1.25rem;
      font-weight: 600;
    }
    .btn-primary {
      background-color: #696cff;
      border-color: #696cff;
    }
  </style>
</head>
<body>

@include('layouts.part.sidebar')
<section id="content">
@include('layouts.part.navbar')

<div class="form-section">
  <div class="card shadow-sm border-0">
    <div class="card-header text-center">
      Form Kendaraan Masuk
    </div>
    <div class="card-body p-4">
      @if (session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
      @endif

      <form action="{{ route('kendaraanmasuk.store') }}" method="POST">
        @csrf

        {{-- Plat Nomor --}}
        <div class="mb-3">
          <label for="no_polisi" class="form-label">Plat Nomor</label>
          <input type="text" name="no_polisi" id="no_polisi"
                 class="form-control @error('no_polisi') is-invalid @enderror"
                 placeholder="Contoh: B 1234 ABC" value="{{ old('no_polisi') }}" required>
          @error('no_polisi')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        {{-- Jenis Kendaraan --}}
        <div class="mb-3">
          <label class="form-label">Jenis Kendaraan</label>
          <div class="d-flex gap-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jenis_kendaraan" id="motor"
                     value="motor" {{ old('jenis_kendaraan') === 'motor' ? 'checked' : '' }} required>
              <label class="form-check-label" for="motor"><i class="fas fa-motorcycle"></i> Motor</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="jenis_kendaraan" id="mobil"
                     value="mobil" {{ old('jenis_kendaraan') === 'mobil' ? 'checked' : '' }} required>
              <label class="form-check-label" for="mobil"><i class="fas fa-car-side"></i> Mobil</label>
            </div>
          </div>
          @error('jenis_kendaraan')
            <div class="text-danger small mt-1">{{ $message }}</div>
          @enderror
        </div>

        {{-- Hidden Fields --}}
        <input type="hidden" name="status_parkir" value="sedang parkir">
        <input type="hidden" name="waktu_masuk" value="{{ now()->format('Y-m-d\TH:i') }}">

        {{-- Tombol --}}
        <div class="d-flex justify-content-between mt-4">
          <a href="{{ route('kendaraanmasuk.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
          </a>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-sign-in-alt me-1"></i> Simpan
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

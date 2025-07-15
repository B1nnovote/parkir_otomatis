<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pembayaran</title>

  <!-- Bootstrap + Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <style>
    body {
      background-color: #f5f5f9;
    }
    .form-section {
      max-width: 650px;
      margin: 40px auto;
    }
    .form-label {
      font-weight: 600;
    }
    .sneat-title {
      color: #696cff;
      font-weight: 600;
    }
    .btn-sneat {
      background-color: #696cff;
      color: white;
      font-weight: 500;
    }
    .btn-sneat:hover {
      background-color: #5a5bd3;
    }
  </style>
</head>
<body>

@include('layouts.part.sidebar')

<section id="content">
@include('layouts.part.navbar')

<div class="container mt-4">
  <div class="form-section">
    <div class="card shadow-sm border-0">
      <div class="card-body p-4">
        <h5 class="sneat-title mb-4"><i class="fas fa-money-bill-wave me-2"></i>Form Pembayaran Parkir</h5>

        @if (session('error'))
          <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form action="{{ route('pembayaran.store') }}" method="POST">
          @csrf

          {{-- Pilih Kendaraan Keluar --}}
          <div class="mb-3">
            <label for="id_kendaraan_keluar" class="form-label">Kendaraan Keluar</label>
            <select name="id_kendaraan_keluar" class="form-select @error('id_kendaraan_keluar') is-invalid @enderror" required>
              <option value="">-- Pilih --</option>
              @foreach ($keluar as $item)
                <option value="{{ $item->id }}">
                  {{ $item->kendaraanMasuk->dataKendaraan->no_polisi }} - {{ ucfirst($item->kendaraanMasuk->dataKendaraan->jenis_kendaraan) }}
                </option>
              @endforeach
            </select>
            @error('id_kendaraan_keluar')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- Total Pembayaran --}}
          <div class="mb-3">
            <label for="total" class="form-label">Total Pembayaran</label>
            <input type="number" step="0.01" name="total" class="form-control @error('total') is-invalid @enderror" required>
            @error('total')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- Metode Pembayaran --}}
          <div class="mb-3">
            <label for="pembayaran" class="form-label">Metode Pembayaran</label>
            <select name="pembayaran" class="form-select @error('pembayaran') is-invalid @enderror" required>
              <option value="">-- Pilih --</option>
              <option value="tunai">Tunai</option>
              <option value="qris">QRIS</option>
              <option value="gratis">Gratis</option>
            </select>
            @error('pembayaran')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          {{-- Kompensasi (jika ada) --}}
          <div class="mb-3">
            <label for="id_kompensasi" class="form-label">Kompensasi</label>
            <select name="id_kompensasi" class="form-select">
              <option value="">-- Tidak Ada --</option>
              @foreach($kompensasi as $k)
                <option value="{{ $k->id }}">{{ ucfirst($k->jenis) }} - Rp{{ number_format($k->biaya) }}</option>
              @endforeach
            </select>
          </div>

          {{-- Tombol --}}
          <div class="d-flex justify-content-between">
            <a href="{{ route('pembayaran.index') }}" class="btn btn-outline-secondary">
              <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
            <button type="submit" class="btn btn-sneat">
              <i class="fas fa-save me-1"></i> Simpan
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

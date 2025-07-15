<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Stok Parkir</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    body {
      background-color: #f5f6fa;
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

<div class="container my-5 col-5 pt-5">
  <div class="card shadow-sm border-0">
 <center>
    <div class="card-header text-center">
      Edit Stok Parkir - {{ ucfirst($stok->jenis_kendaraan) }}
    </div>
    <div class="card-body p-4">
      <form action="{{ route('stok.update', $stok->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="total_slot" class="form-label fw-semibold">Total Slot</label>
          <input type="number" name="total_slot" id="total_slot"
                 class="form-control @error('total_slot') is-invalid @enderror"
                 value="{{ old('total_slot', $stok->total_slot) }}" min="1" required>

          @error('total_slot')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex justify-content-between mt-4">
          <a href="{{ route('stok.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
          </a>
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i> Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
</center>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

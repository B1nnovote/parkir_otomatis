<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Petugas</title>

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
          Tambah Petugas
        </span>
      </div>

      <div class="card shadow-sm border-0">
        <div class="card-header text-white fw-semibold" style="background-color: #696cff">
          Formulir Tambah Petugas
        </div>
        <div class="card-body p-4">
          <form action="{{ route('petugas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Konfirmasi Password</label>
              <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Foto (opsional)</label>
              <input type="file" name="foto" class="form-control">
            </div>

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

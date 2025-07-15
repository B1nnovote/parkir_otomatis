<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Kendaraan</title>

  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
           Edit Data Kendaraan
        </span>
      </div>

      <div class="card shadow-sm border-0">
        <div class="card-header text-white fw-semibold" style="background-color: #696cff">
          Formulir Edit
        </div>
        <div class="card-body p-4">
          <form action="{{ route('datakendaraan.update', $data->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="plat_nomor" class="form-label">Plat Nomor</label>
              <input type="text" name="no_polisi" id="plat_nomor" class="form-control" value="{{ $data->no_polisi }}" required>
            </div>

            <div class="mb-3">
              <label for="jenis" class="form-label">Jenis Kendaraan</label>
              <select name="jenis_kendaraan" id="jenis" class="form-select" required>
                <option value="">-- Pilih Jenis --</option>
                <option value="mobil" {{ $data->jenis_kendaraan == 'mobil' ? 'selected' : '' }}>Mobil</option>
                <option value="motor" {{ $data->jenis_kendaraan == 'motor' ? 'selected' : '' }}>Motor</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="pemilik" class="form-label">Nama Pemilik</label>
              <input type="text" name="pemilik" id="pemilik" class="form-control" value="{{ $data->pemilik }}" required>
            </div>

            <div class="mb-4">
              <label for="status_pemilik" class="form-label">Status Pemilik</label>
              <select name="status_pemilik" id="status_pemilik" class="form-select" required>
                <option value="">-- Pilih Status --</option>
                <option value="guru" {{ $data->status_pemilik == 'guru' ? 'selected' : '' }}>Guru</option>
                <option value="karyawan" {{ $data->status_pemilik == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                <option value="tamu" {{ $data->status_pemilik == 'tamu' ? 'selected' : '' }}>Tamu</option>
              </select>
            </div>

            <div class="d-flex justify-content-between">
              <a href="{{ route('datakendaraan.index') }}" class="btn btn-outline-secondary">
                <i class="bx bx-arrow-back"></i> Kembali
              </a>
              <button type="submit" class="btn " 
              style="background-color: #696cff; color:white;">
                <i class="bx bx-save"></i> Update
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

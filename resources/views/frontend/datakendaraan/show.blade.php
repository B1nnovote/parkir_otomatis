<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Kendaraan</title>

  <!-- Boxicons -->
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- SIDEBAR -->
  @include('layouts.part.sidebar')

  <!-- CONTENT -->
  <section id="content">
    <!-- NAVBAR -->
    @include('layouts.part.navbar')

    <!-- MAIN -->
    <main>
      <div class="container mt-4">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <div class="card shadow-sm border-0">
              <div class="card-header text-white" style="background-color:#696cff ">
                <h5 class="mb-0">Detail Kendaraan</h5>
              </div>
              <div class="card-body">
                <table class="table table-borderless">
                  <tr>
                    <th width="200px">Plat Nomor</th>
                    <td>{{ $data->no_polisi }}</td>
                  </tr>
                  <tr>
                    <th>Jenis Kendaraan</th>
                    <td>{{ ucfirst($data->jenis_kendaraan) }}</td>
                  </tr>
                  <tr>
                    <th>Pemilik</th>
                    <td>{{ $data->pemilik ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Status Pemilik</th>
                    <td>
                      <span class="badge bg-{{ $data->status_pemilik == 'tamu' ? 'secondary' : 'success' }}">
                        {{ ucfirst($data->status_pemilik) }}
                      </span>
                    </td>
                  </tr>
                </table>
                <div class="mt-4">
                  <a href="{{ route('datakendaraan.index') }}" class="btn" style="background-color:#696cff; color:white;">
                    <i class="bx bx-arrow-back"></i> Kembali
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </section>

  <!-- SCRIPT -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Keuangan</title>

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
              <div class="card-header text-white" style="background-color:#696cff">
                <h5 class="mb-0">Detail Transaksi Keuangan</h5>
              </div>
              <div class="card-body">
                <table class="table table-borderless">
                  <tr>
                    <th width="200px">Tanggal Transaksi</th>
                    <td>{{ \Carbon\Carbon::parse($keuangan->waktu_transaksi)->format('d M Y, H:i') }}</td>
                  </tr>
                  <tr>
                    <th>Jumlah</th>
                    <td>Rp {{ number_format($keuangan->jumlah, 0, ',', '.') }}</td>
                  </tr>
                  <tr>
                    <th>keterangan</th>
                    <td>
                      <span class="badge bg-info text-dark text-uppercase">
                        {{ str_replace('_', ' ', $keuangan->keterangan) }}
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <th>Metode Pembayaran</th>
                    <td>
                      <span class="badge bg-secondary">
                        {{ ucfirst($keuangan->pembayaran->pembayaran) }}
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <th>Plat Nomor</th>
                    <td>{{ $keuangan->pembayaran->kendaraanMasuk->dataKendaraan->no_polisi ?? '-' }}</td>
                  </tr>
                  <tr>
                    <th>Jenis Kendaraan</th>
                    <td>{{ ucfirst($keuangan->pembayaran->kendaraanMasuk->dataKendaraan->jenis_kendaraan ?? '-') }}</td>
                  </tr>
                </table>

                <div class="mt-4">
                  <a href="{{ route('keuangan.index') }}" class="btn" style="background-color:#696cff; color:white;">
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

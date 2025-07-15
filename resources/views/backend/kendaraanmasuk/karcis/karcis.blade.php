<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Karcis Parkir</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap & FontAwesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    body {
      background-color: #f5f5f9;
      font-family: 'Segoe UI', sans-serif;
      padding: 40px 20px;
      text-align: center;
    }
    .karcis-box {
      border: 2px dashed #696cff;
      padding: 40px 30px;
      max-width: 420px;
      margin: auto;
      background-color: #fff;
    }
    .karcis-box h5 {
      color: #696cff;
      font-weight: 600;
      margin-bottom: 30px;
    }
    .karcis-table {
      width: 100%;
      text-align: left;
      margin-bottom: 15px;
      font-size: 1rem;
    }
    .karcis-table td {
      padding: 6px 0;
      vertical-align: top;
    }
    .karcis-table td:first-child {
      font-weight: 600;
      width: 100px;
      color: #333;
    }
    .karcis-table td:last-child {
      color: #555;
    }
    .info {
      font-size: 0.85rem;
      color: #6c757d;
      margin-top: 12px;
    }
    .btn-group-custom {
      margin-top: 30px;
    }
    .btn-sneat {
      background-color: #696cff;
      color: white;
      font-weight: 500;
      border: none;
      padding: 8px 14px;
      border-radius: 5px;
      margin: 5px;
      font-size: 0.9rem;
    }
    .btn-sneat:hover {
      background-color: #5a5bd3;
    }
  </style>
</head>
<body>

  <div class="karcis-box shadow-sm">
    <h5><i class="fas fa-ticket-alt me-1"></i>Karcis Parkir</h5>

    <table class="karcis-table mx-auto">
      <tr>
        <td>Plat</td>
        <td>: {{ $data->dataKendaraan->no_polisi }}</td>
      </tr>
      <tr>
        <td>Jenis</td>
        <td>: {{ ucfirst($data->dataKendaraan->jenis_kendaraan) }}</td>
      </tr>
      <tr>
        <td>Masuk</td>
        <td>: {{ \Carbon\Carbon::parse($data->waktu_masuk)->format('d-m-Y H:i') }}</td>
      </tr>
    </table>

    <p class="info">Simpan karcis ini. Wajib ditunjukkan saat keluar.</p>
  </div>

  <div class="btn-group-custom text-center">
    <a href="{{ route('kendaraanmasuk.karcis.pdf', $data->id) }}" class="btn btn-sneat">
      <i class="fas fa-download me-1"></i> Cetak PDF
    </a>
    <a href="{{ route('kendaraanmasuk.index') }}" class="btn btn-outline-secondary">
      <i class="fas fa-home me-1"></i> Kembali
    </a>
  </div>

</body>
</html>

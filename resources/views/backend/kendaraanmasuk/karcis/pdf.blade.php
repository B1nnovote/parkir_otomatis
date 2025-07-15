<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Karcis PDF</title>
  <style>
  body {
    font-family: 'Segoe UI', sans-serif;
    font-size: 12px;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  .karcis-box {
    border: 2px dashed #696cff;
    padding: 20px;
    width: 180px;
    text-align: left;
  }
  .karcis-box h5 {
    text-align: center;
    color: #696cff;
    margin-bottom: 10px;
  }
  .karcis-table {
    width: 100%;
    font-size: 12px;
    margin-bottom: 10px;
  }
  .karcis-table td {
    padding: 2px 0;
  }
  .info {
    font-size: 10px;
    text-align: center;
    margin-top: 10px;
    color: #777;
  }
</style>

</head>
<body>
  <div class="karcis-box">
    <h5>Karcis Parkir</h5>
    <table class="karcis-table">
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
</body>
</html>

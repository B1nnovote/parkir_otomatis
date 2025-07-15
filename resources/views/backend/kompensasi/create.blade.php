<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Kompensasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f9;
        }

        .form-section {
            max-width: 700px;
            margin: 40px auto;
        }

        .form-label {
            font-weight: 600;
        }

        .title-color {
            color: #696cff;
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
                        <h4 class="mb-4 title-color">Ajukan Kompensasi</h4>

                        <form action="{{ route('kompensasi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id_kendaraan_masuk" value="{{ $kendaraan->id }}">

                            <div class="mb-3">
                                <label class="form-label">Jumlah Kompensasi (Rp)</label>
                                <input type="number" name="jumlah"
                                    class="form-control @error('jumlah') is-invalid @enderror" required min="1000">
                                @error('jumlah')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Bukti Foto (opsional)</label>
                                <input type="file" name="bukti_foto"
                                    class="form-control @error('bukti_foto') is-invalid @enderror">
                                @error('bukti_foto')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Keterangan</label>
                                <textarea name="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror"
                                    placeholder="Contoh: kaca spion pecah..."></textarea>
                                @error('keterangan')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-sneat">
                                    <i class="fas fa-paper-plane me-1"></i> Ajukan Kompensasi
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

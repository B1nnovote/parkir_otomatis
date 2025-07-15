<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Parkir</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
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

        .ui-autocomplete {
            background-color: white;
            border: 1px solid #ddd;
            max-height: 200px;
            overflow-y: auto;
            z-index: 9999 !important;
        }

        .ui-menu-item-wrapper {
            padding: 8px 12px;
            cursor: pointer;
            font-size: 14px;
        }

        .ui-state-active {
            background-color: #0d6efd;
            color: white;
            border: none;
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
                        <h4 class="mb-4 title-color">Pembayaran Parkir</h4>

                        <form action="{{ route('pembayaran.store') }}" method="POST">
                            @csrf

                            {{-- Hidden Data --}}
                            <input type="hidden" name="id_kendaraan_masuk" value="{{ $masuk->id }}">
                            <input type="hidden" name="id_kendaraan_keluar" value="{{ $keluar->id }}">
                            <input type="hidden" name="total" value="{{ $total }}">

                            {{-- Info Kendaraan --}}
                            <div class="mb-3">
                                <label class="form-label">Nomor Polisi</label>
                                <input type="text" class="form-control"
                                    value="{{ $masuk->dataKendaraan->no_polisi }}" disabled>
                            </div>

                            {{-- Info Waktu --}}
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label">Waktu Masuk</label>
                                    <input type="text" class="form-control" value="{{ $masuk->waktu_masuk }}"
                                        disabled>
                                </div>
                                <div class="col">
                                    <label class="form-label">Waktu Keluar</label>
                                    <input type="text" class="form-control" value="{{ $keluar->waktu_keluar }}"
                                        disabled>
                                </div>
                            </div>

                            {{-- Tarif dan Denda --}}

                            {{-- Total --}}
                            <div class="mb-4">
                                <label class="form-label">Total Bayar</label>
                                <input type="text" class="form-control fw-bold fs-5"
                                    value="Rp {{ number_format($total, 0, ',', '.') }}" disabled>
                            </div>

                            {{-- Metode Pembayaran --}}
                            <div class="mb-4">
                                <label class="form-label">Metode Pembayaran</label>
                                <select name="pembayaran" class="form-select @error('pembayaran') is-invalid @enderror"
                                    required>
                                    <option value="">-- Pilih Metode --</option>
                                    <option value="tunai">Tunai</option>
                                    <option value="qris">QRIS</option>
                                </select>
                                @error('pembayaran')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tombol --}}
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-sneat">
                                    <i class="fas fa-money-bill-wave me-1"></i> Bayar Sekarang
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

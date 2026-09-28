<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand mb-0 h1">
                Inventaris Perpustakaan
            </span>
        </div>
    </nav>

    <div class="container mt-4">

        <div class="card shadow-sm">

            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Data Buku</h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Terjadi kesalahan!</strong>

                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="kode_buku" class="form-label">
                            Kode Buku
                        </label>

                        <input type="text"
                               class="form-control"
                               id="kode_buku"
                               name="kode_buku"
                               value="{{ old('kode_buku', $buku->kode_buku) }}"
                               placeholder="Contoh: BK001">
                    </div>

                    <div class="mb-3">
                        <label for="judul_buku" class="form-label">
                            Judul Buku
                        </label>

                        <input type="text"
                               class="form-control"
                               id="judul_buku"
                               name="judul_buku"
                               value="{{ old('judul_buku', $buku->judul_buku) }}"
                               placeholder="Masukkan judul buku">
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">
                            Jumlah
                        </label>

                        <input type="number"
                               class="form-control"
                               id="jumlah"
                               name="jumlah"
                               value="{{ old('jumlah', $buku->jumlah) }}"
                               min="0"
                               placeholder="Masukkan jumlah buku">
                    </div>

                    <div class="mb-3">
                        <label for="satuan" class="form-label">
                            Satuan
                        </label>

                        <input type="text"
                               class="form-control"
                               id="satuan"
                               name="satuan"
                               value="{{ old('satuan', $buku->satuan) }}"
                               placeholder="Contoh: buku">
                    </div>

                    <div class="mb-3">
                        <label for="lokasi" class="form-label">
                            Lokasi
                        </label>

                        <input type="text"
                               class="form-control"
                               id="lokasi"
                               name="lokasi"
                               value="{{ old('lokasi', $buku->lokasi) }}"
                               placeholder="Contoh: A001">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('buku.index') }}"
                           class="btn btn-secondary">
                            Kembali
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>

</body>
</html>
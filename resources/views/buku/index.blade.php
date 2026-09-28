<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventaris Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary shadow-sm">
        <div class="container">
            <span class="navbar-brand mb-0 h1">
                Inventaris Perpustakaan
            </span>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="mb-1">Data Buku</h2>
                <p class="text-muted mb-0">
                    Kelola data buku perpustakaan
                </p>
            </div>

            <a href="{{ route('buku.create') }}" class="btn btn-primary">
                + Tambah Buku
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        @endif
        <div class="card shadow-sm">

            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    Daftar Buku
                </h5>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle mb-0">

                        <thead class="table-primary">
                            <tr>
                                <th width="60">No</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th width="100">Jumlah</th>
                                <th>Satuan</th>
                                <th>Lokasi</th>
                                <th width="160">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($buku as $item)

                                <tr>

                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>
                                        <span class="fw-semibold">
                                            {{ $item->kode_buku }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $item->judul_buku }}
                                    </td>

                                    <td>
                                        {{ $item->jumlah }}
                                    </td>

                                    <td>
                                        {{ $item->satuan }}
                                    </td>

                                    <td>
                                        {{ $item->lokasi }}
                                    </td>

                                    <td>

                                        <a href="{{ route('buku.edit', $item->id) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('buku.destroy', $item->id) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                Hapus
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <div class="text-muted">
                                            Belum ada data buku.
                                        </div>
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>
        </div>
        <div class="text-center text-muted mt-4 mb-4">
            <small>
                Sistem Inventaris Perpustakaan
            </small>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>
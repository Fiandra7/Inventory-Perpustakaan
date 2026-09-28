@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container">

    <div class="alert alert-success">
        <h3>Login Berhasil!</h3>

        <p class="mb-0">
            Selamat datang,
            <strong>{{ Auth::user()->name }}</strong>
        </p>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2>Dashboard Inventaris Perpustakaan</h2>
            <p class="text-muted">
                Selamat datang di sistem inventaris perpustakaan.
            </p>
        </div>
    </div>

    <div class="row g-3">

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">
                        Jumlah Jenis Buku
                    </h6>

                    <h2>
                        {{ $jumlahJenis }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">
                        Total Buku
                    </h6>

                    <h2>
                        {{ $totalBuku }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">
                        Stok Menipis
                    </h6>

                    <h2>
                        {{ $stokMenipis }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">
                        Buku Habis
                    </h6>

                    <h2>
                        {{ $bukuHabis }}
                    </h2>
                </div>
            </div>
        </div>

    </div>

    <div class="card shadow-sm mt-4">
        <div class="card-body">

            <h5>Kelola Data Buku</h5>

            <p>
                Tambahkan, lihat, ubah, atau hapus data buku
                perpustakaan.
            </p>

            <a href="{{ route('buku.index') }}" class="btn btn-primary">
                <i class="bi bi-book"></i>
                Lihat Data Buku
            </a>

        </div>
    </div>

</div>

@endsection


<script>

    history.pushState(null, null, location.href);


    window.addEventListener('popstate', function () {

        fetch("{{ route('logout') }}", {

            method: "POST",

            headers: {

                "X-CSRF-TOKEN":
                    "{{ csrf_token() }}",

                "Accept":
                    "application/json"

            }

        })
        .then(function () {

            window.location.replace(
                "{{ route('login') }}"
            );

        })
        .catch(function () {

            window.location.replace(
                "{{ route('login') }}"
            );

        });

    });

    window.addEventListener('pageshow', function (event) {

        if (event.persisted) {

            window.location.reload();

        }

    });

</script>
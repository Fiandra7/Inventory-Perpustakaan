<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Daftar - Inventaris Perpustakaan</title>


    <!-- Google Identity Services -->

    <script
        src="https://accounts.google.com/gsi/client"
        async
        defer>
    </script>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- Bootstrap Icons -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet">


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            min-height: 100vh;

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-family: Arial, sans-serif;

        }


        .register-container {

            width: 100%;

            max-width: 700px;

            padding: 30px;

        }


        /* =========================
           JUDUL
        ========================= */

        .title {

            text-align: center;

            margin-bottom: 45px;

        }


        .title h1 {

            font-size: 36px;

            font-weight: 700;

            color: #102a56;

            margin-bottom: 10px;

        }


        .title p {

            font-size: 18px;

            color: #7183a3;

            margin: 0;

        }


        /* =========================
           LABEL
        ========================= */

        .form-label {

            font-size: 18px;

            font-weight: 600;

            color: #102a56;

            margin-bottom: 10px;

        }


        /* =========================
           INPUT GROUP
        ========================= */

        .input-group {

            margin-bottom: 28px;

        }


        .input-group-text {

            background: white;

            border: 1px solid #cbd8ec;

            border-right: none;

            color: #526b91;

            padding-left: 18px;

            padding-right: 5px;

            border-radius: 10px 0 0 10px;

        }


        .form-control {

            height: 58px;

            border: 1px solid #cbd8ec;

            border-left: none;

            font-size: 16px;

            border-radius: 0 10px 10px 0;

            box-shadow: none !important;

        }


        .form-control:focus {

            border-color: #0d6efd;

        }


        /* =========================
           IKON PASSWORD
        ========================= */

        .password-icon {

            background: white;

            border: 1px solid #cbd8ec;

            border-left: none;

            color: #526b91;

            cursor: pointer;

            border-radius: 0 10px 10px 0;

        }


        /* =========================
           TOMBOL DAFTAR
        ========================= */

        .btn-register {

            width: 100%;

            height: 58px;

            border: none;

            border-radius: 10px;

            background: #1478f2;

            color: white;

            font-size: 18px;

            font-weight: 600;

            margin-top: 5px;

        }


        .btn-register:hover {

            background: #0969df;

        }


        /* =========================
           LINK LOGIN
        ========================= */

        .login-text {

            text-align: center;

            margin-top: 28px;

            font-size: 17px;

            color: #7183a3;

        }


        .login-text a {

            color: #1478f2;

            font-weight: 600;

            text-decoration: none;

        }


        .login-text a:hover {

            text-decoration: underline;

        }


        /* =========================
           PEMBATAS "ATAU"
        ========================= */

        .divider {

            display: flex;

            align-items: center;

            gap: 18px;

            margin: 32px 0;

            color: #7183a3;

            font-size: 16px;

        }


        .divider::before,
        .divider::after {

            content: "";

            height: 1px;

            background: #d7e0ee;

            flex: 1;

        }


        /* =========================
           GOOGLE REGISTER
        ========================= */

        .google-register {

            width: 100%;

            display: flex;

            justify-content: center;

        }


        .google-register .g_id_signin {

            display: flex;

            justify-content: center;

        }


        /* =========================
           ALERT
        ========================= */

        .alert {

            border-radius: 10px;

            margin-bottom: 25px;

        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 600px) {

            .register-container {

                padding: 25px;

            }


            .title {

                margin-bottom: 35px;

            }


            .title h1 {

                font-size: 28px;

            }


            .title p {

                font-size: 16px;

            }

        }

    </style>

</head>


<body>


<div class="register-container">


    <!-- =========================
         JUDUL
    ========================= -->

    <div class="title">

        <h1>
            Inventaris Perpustakaan
        </h1>

        <p>
            Daftar untuk menggunakan sistem.
        </p>

    </div>


    <!-- =========================
         PESAN ERROR
    ========================= -->

    @if ($errors->any())

        <div class="alert alert-danger">

            {{ $errors->first() }}

        </div>

    @endif


    <!-- =========================
         FORM REGISTER
    ========================= -->

    <form
        action="{{ route('register.process') }}"
        method="POST">

        @csrf


        <!-- =========================
             NAMA
        ========================= -->

        <label class="form-label">

            Nama

        </label>


        <div class="input-group">

            <span class="input-group-text">

                <i class="bi bi-person"></i>

            </span>


            <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Masukkan nama Anda"
                value="{{ old('name') }}"
                autocomplete="name"
                required
            >

        </div>


        <!-- =========================
             EMAIL
        ========================= -->

        <label class="form-label">

            Email

        </label>


        <div class="input-group">

            <span class="input-group-text">

                <i class="bi bi-envelope"></i>

            </span>


            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Masukkan email Anda"
                value="{{ old('email') }}"
                autocomplete="email"
                required
            >

        </div>


        <!-- =========================
             PASSWORD
        ========================= -->

        <label class="form-label">

            Password

        </label>


        <div class="input-group">

            <span class="input-group-text">

                <i class="bi bi-lock"></i>

            </span>


            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
                placeholder="Masukkan password Anda"
                autocomplete="new-password"
                required
            >


            <span
                class="input-group-text password-icon"
                onclick="togglePassword(
                    'password',
                    'passwordIcon'
                )">

                <i
                    class="bi bi-eye-slash"
                    id="passwordIcon">
                </i>

            </span>

        </div>


        <!-- =========================
             KONFIRMASI PASSWORD
        ========================= -->

        <label class="form-label">

            Konfirmasi Password

        </label>


        <div class="input-group">

            <span class="input-group-text">

                <i class="bi bi-lock"></i>

            </span>


            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="form-control"
                placeholder="Ulangi password Anda"
                autocomplete="new-password"
                required
            >


            <span
                class="input-group-text password-icon"
                onclick="togglePassword(
                    'password_confirmation',
                    'confirmationIcon'
                )">

                <i
                    class="bi bi-eye-slash"
                    id="confirmationIcon">
                </i>

            </span>

        </div>


        <!-- =========================
             TOMBOL DAFTAR
        ========================= -->

        <button
            type="submit"
            class="btn-register">

            Daftar

        </button>

    </form>


    <!-- =========================
         LINK LOGIN
    ========================= -->

    <div class="login-text">

        Sudah punya akun?

        <a href="{{ route('login') }}">

            Login di sini

        </a>

    </div>


    <!-- =========================
         PEMBATAS
    ========================= -->

    <div class="divider">

        <span>
            atau
        </span>

    </div>


    <!-- =========================
         GOOGLE REGISTER
    ========================= -->

    <div
        id="g_id_onload"

        data-client_id="{{ config('services.google.client_id') }}"

        data-context="signup"

        data-ux_mode="popup"

        data-callback="handleGoogleRegister"

        data-auto_prompt="false">
    </div>


    <div class="google-register">

        <div
            class="g_id_signin"

            data-type="standard"

            data-theme="outline"

            data-size="large"

            data-text="signup_with"

            data-shape="rectangular"

            data-logo_alignment="center"

            data-width="320">

        </div>

    </div>


</div>


<!-- =========================
     PASSWORD SHOW / HIDE
========================= -->

<script>

    function togglePassword(
        inputId,
        iconId
    ) {

        const password =
            document.getElementById(inputId);

        const icon =
            document.getElementById(iconId);


        if (password.type === "password") {

            password.type = "text";

            icon.classList.remove(
                "bi-eye-slash"
            );

            icon.classList.add(
                "bi-eye"
            );

        } else {

            password.type = "password";

            icon.classList.remove(
                "bi-eye"
            );

            icon.classList.add(
                "bi-eye-slash"
            );

        }

    }

</script>


<!-- =========================
     GOOGLE REGISTER CALLBACK
========================= -->

<script>

    function handleGoogleRegister(response) {

        console.log(
            "Google berhasil memilih akun untuk pendaftaran."
        );

        console.log(response);

        /*
         * Untuk saat ini credential Google
         * belum dikirim ke Laravel.
         *
         * Backend Google Register dapat
         * dihubungkan setelah konfigurasi
         * Google Client ID selesai.
         */

    }

</script>

<script>
function handleGoogleRegister(response) {

    fetch("{{ route('google.login') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Accept": "application/json"
        },
        body: JSON.stringify({
            credential: response.credential
        })
    })
    .then(async function (res) {

        const data = await res.json();

        if (!res.ok) {
            throw new Error(
                data.message || "Pendaftaran dengan Google gagal."
            );
        }

        return data;
    })
    .then(function (data) {

        if (data.success) {
            window.location.href = data.redirect;
        }

    })
    .catch(function (error) {

        alert(error.message);
        console.error(error);

    });
}
</script>

</body>

</html>
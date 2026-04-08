<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Sistem Informasi Pengelolaan Aset Pustekinfo</title>

    <!-- FAVICON -->
    <link rel="shortcut icon"
          href="{{ asset('admin-dashbyte/dist/assets/img/favicon.png') }}">

    <!-- BOOTSTRAP -->
    <link rel="stylesheet"
          href="{{ asset('admin-dashbyte/dist/lib/bootstrap/css/bootstrap.min.css') }}">

    <!-- ICON -->
    <link rel="stylesheet"
          href="{{ asset('admin-dashbyte/dist/lib/remixicon/fonts/remixicon.css') }}">

    <!-- DASHBYTE -->
    <link rel="stylesheet"
          href="{{ asset('admin-dashbyte/dist/assets/css/style.min.css') }}">

<style>
    body {
        background: #f4f6f9;
    }

    .auth-bg {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 48px 24px;
    }

    .auth-wrapper {
        width: 100%;
        max-width: 1100px;
        min-height: 600px;
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        display: flex;
    }

    .auth-left {
        width: 45%;
        padding: 56px 48px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .auth-right {
        width: 55%;
        background: url('{{ asset('admin-dashbyte/dist/assets/img/bg-dpr.jpg') }}')
                    no-repeat center center;
        background-size: cover;
        position: relative;
    }

    .auth-right::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(255,255,255,0.4);
        backdrop-filter: grayscale(100%) brightness(1.05);
    }

    @media (max-width: 768px) {
        .auth-wrapper {
            flex-direction: column;
            min-height: auto;
        }

        .auth-right {
            display: none;
        }

        .auth-left {
            width: 100%;
        }
    }

    /* ================= THEME LOGIN ================= */

    /* tombol */
    .btn-primary {
        background-color: #067788 !important;
        border-color: #067788 !important;
        color: #fff !important;
    }

    .btn-primary:hover {
        background-color: #055e6a !important;
        border-color: #055e6a !important;
    }

    /* link */
    .auth-left a {
        color: #067788 !important;
        font-weight: 500;
    }

    .auth-left a:hover {
        color: #055e6a !important;
        text-decoration: underline;
    }

    /* input focus */
.form-control:focus {
    border-color: #067788;
    box-shadow: 0 0 0 0.2rem rgba(6,119,136,0.2);
}
</style>

</head>

<body>

<div class="auth-bg">
    <div class="auth-wrapper">

        <!-- KIRI -->
        <div class="auth-left">
            <div class="w-100" style="max-width: 380px;">

                <div class="text-center mb-4">
                    <img src="{{ asset('admin-dashbyte/dist/assets/img/logo.png') }}"
                         alt="Logo Pustekinfo"
                         width="150"
                         class="mb-2">

                    <h5 class="fw-bold mb-1">
                        Sistem Informasi Pengelolaan Aset
                    </h5>
                    <p class="text-muted">Pustekinfo</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- USERNAME --}}
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text"
                               name="username"
                               value="{{ old('username') }}"
                               class="form-control @error('username') is-invalid @enderror"
                               placeholder="Masukkan Username"
                               required autofocus>

                        @error('username')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-4">
                        <label class="form-label d-flex justify-content-between">
                            Kata Sandi
                            <a href="javascript:void(0)"
                               class="text-sm"
                               onclick="alert('Silakan hubungi Admin Pustekinfo')">
                                Lupa sandi?
                            </a>
                        </label>

                        <div class="position-relative">
                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="form-control pe-5 @error('password') is-invalid @enderror"
                                   placeholder="Masukkan Kata Sandi"
                                   required>

                            <i class="ri-eye-line position-absolute"
                               id="togglePassword"
                               style="top: 50%; right: 15px; transform: translateY(-50%); cursor: pointer; font-size:18px;">
                            </i>
                        </div>

                        @error('password')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit"
                            class="btn btn-primary w-100">
                        Masuk
                    </button>

                </form>

            </div>
        </div>

        <!-- KANAN -->
        <div class="auth-right"></div>

    </div>
</div>

<script src="{{ asset('admin-dashbyte/dist/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    togglePassword.addEventListener('click', function () {

        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        this.classList.toggle('ri-eye-line');
        this.classList.toggle('ri-eye-off-line');
    });

});
</script>

</body>
</html>
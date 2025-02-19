<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Now</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">


</head>

<body>

    <div class="login-page bg-light d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <h3 class="mb-3">Login Now</h3>
        <div class="bg-white shadow rounded w-75">
            <div class="form-left h-100 w-100 py-5 px-5">
                <form action="{{ route('login.action') }}"
                    class="row g-4 d-flex flex-column justify-content-center align-items-center" method="post">
                    @csrf
                    @if (session('gagal'))
                        <div class="alert alert-danger mt-4">
                            {{ session('gagal') }}
                        </div>
                    @endif
                    <div class="col-12">
                        <label>Email<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                            <input type="text" class="form-control" placeholder="Enter Email" name="email"
                                required>
                        </div>
                    </div>

                    <div class="col-12">
                        <label>Password<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password"
                                required>
                            <button type="button" class="btn btn-link text-black" id="viewpass"><i
                                    class="bi bi-eye-fill"></i></button>
                        </div>
                    </div>
                    <div class="col-12">
                        <a href="{{ route('registrasi.tampil') }}" class="text-decoration-none">Belum Punya Akun ?</a>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-lg-5 float-end mt-4">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- Script Js Custom --}}
    <script>
        let btnViewPass = document.getElementById('viewpass');
        let formPass = document.querySelector('input[name="password"]');

        btnViewPass.addEventListener('click', () => {
            if (formPass.type === 'password') {
                formPass.type = 'text'
                btnViewPass.innerHTML = '<i class="bi bi-eye-slash-fill"></i>'
            } else {
                formPass.type = 'password'
                btnViewPass.innerHTML = '<i class="bi bi-eye-fill"></i>'
            }
        })
    </script>
</body>

</html>

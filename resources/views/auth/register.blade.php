<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register Now</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">


</head>

<body>

    <div class="login-page bg-light d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <h3 class="mb-3">Register Now</h3>
        <div class="bg-white shadow rounded w-75">
            <div class="form-left h-100 w-100 py-5 px-5">
                <form action="{{ route('registrasi.store') }}"
                    class="row g-4 d-flex flex-column justify-content-center align-items-center" method="post">
                    @csrf
                    <div class="col-12">
                        <label>Name<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name">
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Email<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                            <input type="email" class="form-control" placeholder="Enter Email" name="email">
                        </div>
                    </div>

                    <div class="col-12">
                        <label>Password<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-lg-5 float-end mt-4">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>

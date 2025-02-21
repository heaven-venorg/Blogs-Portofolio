@extends('admin.layout.app')
@section('content')
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center w-100">
        <h1>Form Edit Postingan</h1>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('user.update', $user->id) }}" method="post" class="w-75 d-flex flex-column gap-2">
            @csrf
            @method('PUT')
            <input type="text" name="name" class="form-control" placeholder="Masukan nama user"
                value="{{ $user->name }}">
            @if ($errors->has('name'))
                <div class="alert alert-warning">Name Wajib Diisi</div>
            @endif
            <input type="email" name="email" class="form-control" placeholder="Masukan email user"
                value="{{ $user->email }}">
            @if ($errors->has('email'))
                <div class="alert alert-warning">Email Wajib Diisi</div>
            @endif
            <select name="role" class="form-select" required>
                <option value="admin" selected>Admin</option>
                <option value="user">User</option>
            </select>
            <div class="group d-flex">
                <input type="reset" value="Kosongkan" class="btn btn-dark w-25 d-flex me-auto">
                <input type="submit" value="Tambah Postingan" class="btn btn-primary w-25 d-flex ms-auto">
            </div>
        </form>
    </div>
@endsection

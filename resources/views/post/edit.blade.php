@extends('admin.layout.app')
@section('content')
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center w-100">
        <h1>Form Edit Postingan</h1>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('post.update', $post->id) }}" method="post" class="w-75 d-flex flex-column gap-2">
            @csrf
            @method('PUT')
            <input type="text" name="title" class="form-control" placeholder="Masukan judul artikel"
                value="{{ $post->title }}">
            @if ($errors->has('title'))
                <div class="alert alert-warning">Title Wajib Diisi</div>
            @endif
            <textarea name="content" rows="15" class="form-control" placeholder="Masukan content artikel">{!! htmlspecialchars_decode($post->content) !!}</textarea>
            @if ($errors->has('content'))
                <div class="alert alert-warning">Content Wajib Diisi</div>
            @endif
            <select name="visibility" class="form-select" required>
                <option value="Public" selected>Public</option>
                <option value="Private">Private</option>
            </select>
            <div class="group d-flex">
                <input type="reset" value="Kosongkan" class="btn btn-dark w-25 d-flex me-auto">
                <input type="submit" value="Tambah Postingan" class="btn btn-primary w-25 d-flex ms-auto">
            </div>
        </form>
    </div>
@endsection

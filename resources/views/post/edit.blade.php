@extends('admin.layout.app')
@section('content')
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center w-100">
        <h1>Form Edit Postingan</h1>
        <form action="{{ route('post.update', $post->id) }}" method="post" class="w-75 d-flex flex-column gap-2">
            @csrf
            @method('PUT')
            <input type="text" name="title" class="form-control" placeholder="Masukan judul artikel"
                value="{{ $post->title }}">
            <textarea name="content" rows="10" class="form-control" placeholder="Masukan content artikel">{{ $post->content }}</textarea>
            <select class="form-select" name="visibility">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
            <div class="group d-flex">
                <input type="reset" value="Kosongkan" class="btn btn-dark w-25 d-flex me-auto">
                <input type="submit" value="Update Postingan" class="btn btn-primary w-25 d-flex ms-auto">
            </div>
        </form>
    </div>
@endsection

@extends('admin.layout.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Postingan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard Postingan</li>
        </ol>
        <div class="card mb-4">
            @if (session('success'))
                <div class="alert alert-success" id="successAlert">{{ session('success') }}</div>
            @endif

            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="group">
                    <i class="fas fa-table me-1"></i>
                    DataTable Postingan
                </div>
                <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm">Tambah Postingan</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Visibility</th>
                            <th>Author</th>
                            <th>Author Update</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ Str::limit($post->title, 30, ' ...') }}</td>
                                <td> {!! htmlspecialchars_decode(Str::limit($post->content, 20, ' ...')) !!}</td>
                                <td>{{ $post->visibility }}</td>
                                <td>{{ $post->author }}</td>
                                @if ($post->author_update == null)
                                    <td>Belum Diupdate</td>
                                @else
                                    <td>{{ $post->author_update }}</td>
                                @endif
                                <td>
                                    <div class="d-flex gap-3 justify-content-center">
                                        <a href="{{ route('post.edit', $post->id) }}"
                                            class="btn p-0 btn-link text-decoration-none fs-6 text-warning"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-link text-decoration-none fs-6 p-0 text-danger"><i
                                                    class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        let successAlert = document.getElementById('successAlert')

        successAlert.style.display = 'block';

        setTimeout(function() {
            successAlert.style.display = 'none';
        }, 3000);
    </script>
@endsection

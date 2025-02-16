@extends('admin.layout.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Postingan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard Postingan</li>
        </ol>
        <div class="card mb-4">
        @section('success')
            <div class="alert alert-success" id="successAlert">Postingan Berhasil Dibuat</div>
        @endsection
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
                        <th>Ttile</th>
                        <th>Content</th>
                        <th>Visibility</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Str::limit($post->title, 30, ' ...') }}</td>
                            <td>{{ Str::limit($post->content, 30, ' ...') }}</td>
                            <td>{{ $post->visibility }}</td>
                            <td>{{ $post->author }}</td>
                            <td>
                                <a href="#!">Edit</a>
                                <a href="#!">Delete</a>
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

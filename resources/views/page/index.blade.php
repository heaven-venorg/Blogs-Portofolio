@extends('page.layout.index')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @forelse ($posts as $post)
                    <!-- Post previ ew-->
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">{{ Str::limit($post->title, 20, ' ...') }}</h2>
                            <h3 class="post-subtitle">{!! html_entity_decode(Str::limit($post->content, 20, ' ...')) !!}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by {{ $post->author }} on {{ $post->updated_at }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @empty
                    <div class="alert alert-danger">Postingan Tidak ditemukan</div>
                @endforelse
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older
                        Posts →</a></div>
            </div>
        </div>
    </div>
@endsection

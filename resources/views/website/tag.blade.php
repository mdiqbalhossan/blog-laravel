@extends('layouts.website')

@section('title',$tag_post->name)

@section('content')
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <span>Tag</span>
                <h3>{{ $tag_post->name }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="site-section bg-white">
    <div class="container">
        <div class="row">
            @foreach ($tag_posts as $post)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{ route('posts',$post->slug) }}"><img src="{{ asset('images') }}/{{ $post->image }}"
                            alt="Image" class="img-fluid rounded"></a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-secondary mb-3">{{ $post->category->name }}</span>

                        <h2><a href="{{ route('posts',$post->slug) }}">{{ $post->title }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="{{ asset($post->user->avatar) }}" alt="Image" class="img-fluid">
                            </figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{ $post->user->name }}</a></span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->format('d M, Y') }}</span>
                        </div>

                        <p>{{\Illuminate\Support\Str::words($post->body, 10,'...'); }}</p>
                        <p><a href="#">{{ route('posts',$post->slug) }}</a></p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="d-flex justify-content-center">
            {!! $recent_post->links() !!}
        </div>
    </div>
</div>
@endsection
@extends('layouts.website')

@section('title', $setting->site_title )

@section('content')
<div class="site-section bg-light">
    <div class="container">
        <div class="row align-items-stretch retro-layout-2">
            @foreach ($posts as $post)
            <div class="col-md-4">
                <a href="{{ route('posts',$post->slug) }}" class="h-entry mb-30 v-height gradient"
                    style="background-image: url('{{ asset('images') }}/{{ $post->image }}');">

                    <div class="text">
                        <h2>{{ $post->title }}</h2>
                        <span class="date">{{ $post->created_at->format('d M, Y') }}</span>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                <h2>Recent Posts</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($recent_post as $item)
            <div class="col-lg-4 mb-4">
                <div class="entry2">
                    <a href="{{ route('posts',$item->slug) }}"><img src="{{ asset('images') }}/{{ $item->image }}"
                            alt="Image" class="img-fluid rounded" style="width: 350px; height: 200px;"></a>
                    <div class="excerpt">
                        <span class="post-category text-white bg-secondary mb-3">{{ $item->category->name }}</span>

                        <h2><a href="{{ route('posts',$item->slug) }}">{{ $item->title }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 mr-3 float-left"><img
                                    src="{{ asset($item->user->avatar) }}" alt="Image" class="img-fluid">
                            </figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{ $item->user->name }}</a></span>
                            <span>&nbsp;-&nbsp; {{ $item->created_at->format('d M, Y') }}</span>
                        </div>

                        <p>{{\Illuminate\Support\Str::words($item->body, 10,'...'); }}</p>
                        <p><a href="{{ route('posts',$item->slug) }}">Read More</a></p>
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
@extends('layouts.website')

@section('title',$post->title)

@section('content')
<div class="site-cover site-cover-sm same-height overlay single-page"
    style="background-image: url('{{ asset('images') }}/{{ $post->image }}');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <span class="post-category text-white bg-success mb-3">{{ $post->category->name }}</span>
                    <h1 class="mb-4"><a href="{{ $post->slug }}">{{ $post->title }}</a></h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 mr-3 d-inline-block"><img
                                src="{{ asset($post->user->avatar) }}" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By {{ $post->user->name }}</span>
                        <span>&nbsp;-&nbsp; {{ $post->created_at->format('d M, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="site-section py-lg">
    <div class="container">

        <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">

                <div class="post-content-body">
                    {!! $post->body !!}
                </div>


                <div class="pt-5">
                    <p>Categories: <a href="#">{{ $post->category->name }}</a>
                        Tags:
                        @foreach ($post->tags as $tag)
                        <a href="{{ route('tag',$tag->slug) }}">#{{ $tag->name }}</a>,
                        @endforeach
                    </p>
                </div>


                <div class="pt-5">
                    @include('includes.comment')
                </div>

            </div>

            <!-- END main-content -->
            @include('includes.sidebar')
            <!-- END sidebar -->

        </div>
    </div>
</section>

<div class="site-section bg-light">
    <div class="container">

        <div class="row mb-5">
            <div class="col-12">
                <h2>More Related Posts</h2>
            </div>
        </div>

        <div class="row align-items-stretch retro-layout-2">
            @foreach ($related_posts as $post)
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

@endsection

@push('js')
@endpush
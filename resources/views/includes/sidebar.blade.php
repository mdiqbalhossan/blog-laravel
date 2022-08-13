<div class="col-md-12 col-lg-4 sidebar">
    <div class="sidebar-box search-form-wrap">
        <form action="#" class="search-form">
            <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
            </div>
        </form>
    </div>
    <!-- END sidebar-box -->
    @if ($setting->author_bio == 1)
    <div class="sidebar-box">
        <div class="bio text-center">
            <img src="{{ asset($post->user->avatar) }}" alt="Image Placeholder" class="img-fluid mb-5">
            <div class="bio-body">
                <h2>{{ $post->user->name }}</h2>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem
                    facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam fuga
                    sit molestias minus.</p>
                <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                <p class="social">
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p>
            </div>
        </div>
    </div>
    @endif

    <!-- END sidebar-box -->
    @if ($setting->popular_post == 1)
    <div class="sidebar-box">
        <h3 class="heading">Popular Posts</h3>
        <div class="post-entry-sidebar">
            <ul>
                @foreach ($popular_posts as $post)
                <li>
                    <a href="{{ route('posts',$post->slug) }}">
                        <img src="{{ asset('images') }}/{{ $post->image }}" alt="{{ $post->title }}" class="mr-4">
                        <div class="text">
                            <h4>{{ $post->title }}</h4>
                            <div class="post-meta">
                                <span class="mr-2">{{ $post->created_at->format('d M, Y') }} </span>
                            </div>
                        </div>
                    </a>
                </li>
                @endforeach


            </ul>
        </div>
    </div>
    @endif

    <!-- END sidebar-box -->
    @if ($setting->category)
    <div class="sidebar-box">
        <h3 class="heading">Categories</h3>
        <ul class="categories">
            @foreach ($category as $item)
            <li><a href="{{ route('category',$item->slug) }}">{{ $item->name }} <span>({{ $item->posts->count()
                        }})</span></a></li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- END sidebar-box -->
    @if ($setting->tags)
    <div class="sidebar-box">
        <h3 class="heading">Tags</h3>
        <ul class="tags">
            @foreach ($tags as $item)
            <li><a href="{{ route('tag',$item->slug) }}">{{ $item->name }}</a></li>
            @endforeach
        </ul>
    </div>
    @endif

</div>
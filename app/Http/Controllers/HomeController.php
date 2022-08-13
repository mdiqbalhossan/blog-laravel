<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $category = Category::take(5)->get();
        $posts = Post::orderBy('views', 'desc')->take(6)->get();
        $recent_post = Post::orderBy('created_at', 'desc')->paginate(6);

        return view('website.index', compact('setting','category','posts','recent_post'));
    }

    public function show_post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->views = $post->views + 1;
        $post->save();
        $setting = Setting::first();
        $category = Category::take(5)->get();
        $posts = Post::orderBy('views', 'desc')->take(6)->get();
        $recent_post = Post::orderBy('created_at', 'desc')->paginate(6);
        $popular_posts = Post::orderBy('views', 'desc')->take(3)->get();
        $tags = Tag::all();
        $related_posts = Post::where('category_id', $post->category_id)->take(3)->get();
        return view('website.post', compact('tags','setting','category','posts','recent_post','post','popular_posts','related_posts'));
    }

    public function show_category($slug)
    {
        $setting = Setting::first();
        $category = Category::take(5)->get();
        $posts = Post::orderBy('views', 'desc')->take(6)->get();
        $recent_post = Post::orderBy('created_at', 'desc')->paginate(6);
        $category_post = Category::where('slug', $slug)->first();
        $category_posts = $category_post->posts()->paginate(9);
        return view('website.category', compact('setting','category','posts','recent_post','category_posts','category_post'));
    }

    public function show_tag($slug)
    {
        $setting = Setting::first();
        $category = Category::take(5)->get();
        $posts = Post::orderBy('views', 'desc')->take(6)->get();
        $recent_post = Post::orderBy('created_at', 'desc')->paginate(6);
        $tag_post = Tag::where('slug', $slug)->first();
        $tag_posts = $tag_post->posts()->paginate(9);
        return view('website.tag', compact('setting','category','posts','recent_post','tag_posts','tag_post'));
    }
}

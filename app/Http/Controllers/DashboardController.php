<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $post = Post::all()->count();
        $category = Category::all()->count();
        $tags = Tag::all()->count();
        $subscription = Subscription::all()->count();
        $posts = Post::orderBy('id', 'desc')->take(10)->get();
        return view('admin.index',compact('post','category','tags','subscription','posts'));
    }


}

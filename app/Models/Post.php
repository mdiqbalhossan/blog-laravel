<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'category_id', 'user_id','image'];

    protected $table = 'posts';

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

   public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
}

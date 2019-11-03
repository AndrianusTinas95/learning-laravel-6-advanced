<?php

namespace App;

use App\Http\QueryFilter\MaxCount;
use Illuminate\Database\Eloquent\Model;
use App\Http\QueryFilter\Sort;
use App\Http\QueryFilter\Status;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pipeline\Pipeline;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title', 'body'
    ];

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public static function allPost(){
        return app(Pipeline::class)
            ->send(Post::query())
            ->through([
                Status::class,
                Sort::class,
                MaxCount::class,
            ])
            ->thenReturn()
            ->paginate(5);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $with = ['author', 'category'];
    protected $appends = ['published_at_in_time_ago'];

    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function publishedAtInTimeAgo(): Attribute
    {
        return Attribute::make(
            get:fn() => $this->created_at->shortAbsoluteDiffForHumans(),
        );
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}

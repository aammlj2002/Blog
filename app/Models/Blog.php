<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable=["title", "body", "slug", "intro", "category_id", "user_id",'thumbnail'];
    protected $with=["category", "author"];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function scopeFilter($query, $filter)
    {
        $query->when($filter["search"]?? false, function ($query, $search) {
            $query->where("title", "LIKE", "%$search%")
                    ->orWhere("body", "LIKE", "%$search%");
        });
        $query->when($filter["category"]?? false, function ($query, $slug) {
            $query->whereHas("category", function ($query) use ($slug) {
                $query->where("slug", $slug);
            });
        });
        $query->when($filter["username"]?? false, function ($query, $username) {
            $query->whereHas("author", function ($query) use ($username) {
                $query->where("username", $username);
            });
        });
    }
    public function getThumbnailAttribute($value)
    {
        return $value ? asset("/storage/$value") : asset("/images/placeholder.png");
    }
    public function comments()
    {
        return $this->hasMany(Comment::class)->where("parent_id", "=", null);
    }
}

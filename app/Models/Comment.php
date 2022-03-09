<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        "body",
        "user_id",
        "blog_id",
    ];
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, "parent_id");
    }
    public function author()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}

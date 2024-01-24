<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public $table = 'feedbacks';

    protected $fillable = ['title', 'description', 'user_id', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}

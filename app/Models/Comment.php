<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'user_id', 'feedback_id'];

    protected $hidden = ['updated_at', 'user_id', 'feedback_id'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans(null, null, true);
    }

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

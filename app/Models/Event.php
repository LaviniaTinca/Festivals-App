<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maize\Markable\Markable;
use Maize\Markable\Models\Like;

class Event extends Model
{
    use HasFactory, Markable;

    protected $guarded = [];
    protected $attributes = [
        'likes' => 0,
        'festival_id' => 1,
    ];
    protected static $marks = [
        Like::class,
    ];

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'event_category_id');
    }

    public function festival()
    {
        return $this->belongsTo(Festival::class, 'festival_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

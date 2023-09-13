<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maize\Markable\Markable;
use Maize\Markable\Models\Like;

class Festival extends Model
{
    use HasFactory, Markable;
    protected $guarded = [];
    protected $attributes = [
        'likes' => 0
    ];
    protected static $marks = [
        Like::class,
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) => $query
            ->where(fn($query) => $query
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
            ));

        $query->when($filters['category'] ?? false, fn($query, $category) => $query
            ->whereHas('category', fn($query) => $query
                ->where('id', $category)));


    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function category()
    {
        return $this->belongsTo(FestivalCategory::class, 'festival_category_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

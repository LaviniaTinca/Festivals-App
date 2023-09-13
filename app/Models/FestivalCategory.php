<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FestivalCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function festivals()
    {
        return $this->hasMany(Festival::class);
    }
}

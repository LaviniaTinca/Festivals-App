<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $attributes = [
        'festival_id' => 1
    ];
    protected static $marks = [
        Like::class,
    ];


    public function festival()
    {
        return $this->belongsTo(Festival::class);
    }

    public function soldTicket()
    {
        return $this->belongsTo(SoldTicket::class);
    }
}

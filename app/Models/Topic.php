<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    // fields can be filled
    protected $fillable = ['title', 'poll_id', 'nr_votes'];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    // fields can be filled
    protected $fillable = [
        'title', 'body', 'slug', 'totalVotes', 'category_id',
        'valid_until', 'schedulle', 'publish'
    ];

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    public function category()
    {
        return $this->belongsTo(Voyager::modelClass('Category'));
    }

    public function pollView()
    {
        return $this->hasMany(PollView::class);
    }

    public function showPoll()
    {
        if (auth()->id() == null) {
            return $this->pollView()
                ->where('ip', '=',  request()->ip())->exists();
        }

        return $this->pollView()
            ->where(function ($pollViewsQuery) {
                $pollViewsQuery
                    ->where('session_id', '=', request()->getSession()->getId())
                    ->orWhere('user_id', '=', (auth()->check()));
            })->exists();
    }


    public static function calcVotes($topic)
    {
    }

    public static function incrementVote($topic)
    {
    }

    public static function decrementVote($topic)
    {
    }
}

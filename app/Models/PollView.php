<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollView extends Model
{
    use HasFactory;

    public function pollView()
    {
        return $this->belongsTo(Poll::class);
    }

    public static function createViewLog($poll)
    {
        $pollViews = new PollView();
        $pollViews->poll_id = $poll->id;
        $pollViews->slug = $poll->slug;
        $pollViews->url = request()->url();
        $pollViews->session_id = request()->getSession()->getId();
        $pollViews->user_id = (auth()->check()) ? auth()->id() : null;
        $pollViews->ip = request()->ip();
        $pollViews->agent = request()->header('User-Agent');
        $pollViews->save();
    }
}

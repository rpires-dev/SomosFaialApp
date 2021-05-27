<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\PollView;
use App\Models\Topic;
use Jenssegers\Date\Date;
use Illuminate\Http\Request;

class PollController extends Controller
{

    public function index()
    {

        Date::setLocale('pt');
        $polls = Poll::where('publish', 1)->orderBy('id', 'DESC')->get();

        return view('polls.index')->with(
            [
                'polls' => $polls,
            ]
        );
    }

    public function show($slug)
    {


        Date::setLocale('pt');
        $view = [];
        $poll = Poll::where('slug', $slug)->firstOrFail();
        $topics = Topic::where('poll_id', $poll->id)->get();
        $prevPoll = Poll::where('id', '<', $poll->id)->orderBy('id', 'desc')->first();
        $nextPoll = Poll::where('id', '>', $poll->id)->orderBy('id')->first();
        $totalVotes = $poll->totalVotes;

        if ($totalVotes == 0) {
            $totalVotes = 1;
        }

        $alreadyVote = false;
        if ($poll->showPoll()) {

            $alreadyVote = true;
        }
        return view('polls.show')->with([
            'totalVotes' => $totalVotes,
            'poll' => $poll,
            'topics' => $topics,
            'alreadyVote' => $alreadyVote,
            'prevPoll' => $prevPoll,
            'nextPoll' => $nextPoll,
        ]);
    }

    public function vote(Request $request)
    {

        $poll_id = Topic::where('id', $request->r)->pluck('poll_id');



        $poll = Poll::where('id', $poll_id)->firstOrFail();
        $topic = Topic::where('id', $request->r)->firstOrFail();


        // If post was seen by user show post else add log
        if ($poll->showPoll()) {
            return back()->with('message', 'Não Possivel votar 2 x');
        } else {

            PollView::createViewLog($poll);
            $poll->increment('totalVotes', 1);
            $topic->increment('nr_votes', 1);
            return back()->with('message', 'Obrigado pelo voto');
        }

        Topic::where('id', $request->r)->increment("nr_votes");
        return back()->with('message', 'A sua mensagem foi enviada, voltaremos a entrar em contato consigo em breve');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class CalendarController extends Controller
{
    public function index()
    {

        Date::setLocale('pt');
        $event = 0;

        return view('calendar.index')->with(
            [
                'event' => $event,
            ]
        );
    }
}

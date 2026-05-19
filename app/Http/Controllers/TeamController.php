<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;

class TeamController extends Controller
{
    public function __invoke()
    {
        $teams = TeamMember::orderBy('sort_order')->get();

        return view('our-team', compact('teams'));
    }
}

<?php

namespace App\Traits;

use App\Models\Session;

trait ActiveSession
{
    public function activeSession()
    {
        $session = Session::where('active', true)->first();
        $currentSession = $session->from.'/'.$session->to;
        return $currentSession;
    }

    public function activeYear()
    {
        $session = $this->activeSession();
        $year = explode('/', $session);
        return $year[0];
    }
}



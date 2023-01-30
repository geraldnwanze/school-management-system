<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Models\Session;
use Illuminate\Support\Facades\Log;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::all();
        return view('dashboard.sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('dashboard.sessions.create');
    }

    public function store(StoreSessionRequest $request)
    {
        try {
            if (!Session::create($request->validated())) {
                return back()->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.sessions.index')->with('success', 'new session created');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'something went wrong');
        }
    }

    public function show(Session $session)
    {
        //
    }

    public function edit(Session $session)
    {
        return view('dashboard.sessions.edit', compact('session'));
    }

    public function update(UpdateSessionRequest $request, Session $session)
    {
        try {
            if (!$session->update($request->validated())) {
                return back()->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.sessions.index')->with('success', 'session updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'something went wrong');
        }
    }

    public function toggleStatus(Session $session)
    {
        try {
            $sessions = Session::where('active', true)->where('id', '!=', $session->id)->get();
            if ($sessions->count() > 0) {
                return back()->with('error', 'you can only have one active session');
            }
            if (!$session->update(['active' => !$session->active])) {
                return back()->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.sessions.index')->with('success', 'status updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'something went wrong');
        }
    }

    public function destroy(Session $session)
    {
        try {
            if (!$session->delete()) {
                return back()->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.sessions.index')->with('success', 'session deleted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'something went wrong');
        }
    }
}

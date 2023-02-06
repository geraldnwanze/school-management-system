<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Http\Resources\SessionResource;
use App\Models\Session;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    use ApiResponses;

    public function index()
    {
        $sessions = SessionResource::collection(Session::paginate());
        return $this->success($sessions, 'records retrieved');
    }

    public function store(StoreSessionRequest $request)
    {
        $session = new SessionResource(Session::create($request->validated()));
        return $this->success($session, 'session created', 201);
    }

    public function update(UpdateSessionRequest $request, Session $session)
    {
        $session->update($request->validated());
        $session = new SessionResource($session);
        return $this->success($session, 'session updated');
    }

    public function toggleStatus(Session $session)
    {
        $sessions = Session::where('active', true)->where('id', '!=', $session->id)->get();
        if ($sessions->count() > 0) {
            return $this->error('you can only have one active session', 422);
        }
        $session->update(['active' => !$session->active]);
        $session = new SessionResource($session);
        return $this->success($session, 'status updated');
    }

    public function destroy(Session $session)
    {
        $session->delete();
        return $this->success(null, 'session deleted', 204);
    }

    public function deleted()
    {
        $sessions = SessionResource::collection(Session::onlyTrashed()->paginate());
        return $this->success($sessions, 'records retrieved');
    }

    public function restore($session)
    {
        Session::onlyTrashed()->find($session)->restore();
        return $this->success(null, 'record restored', 204);
    }

    public function forceDelete($session)
    {
        Session::onlyTrashed()->find($session)->forceDelete();
        return $this->success(null, 'record permanently deleted', 204);
    }
}

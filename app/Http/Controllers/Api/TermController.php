<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\StoreTermRequest;
use App\Http\Requests\UpdateTermRequest;
use App\Http\Resources\TermResource;
use App\Models\Term;
use App\Traits\ApiResponses;

class TermController extends ApiController
{
    use ApiResponses;

    public function index()
    {
        $terms = TermResource::collection(Term::paginate());
        return $this->success($terms, 'terms retrieved');
    }

    public function store(StoreTermRequest $request)
    {
        $term = new TermResource(Term::create($request->validated()));
        return $this->success($term, 'term created', 201);
    }

    public function update(UpdateTermRequest $request, Term $term)
    {
        $term->update($request->validated());
        $term = new TermResource($term);
        return $this->success($term, 'term updated');
    }

    public function toggleStatus(Term $term)
    {
        $term->update(['active' => !$term->active]);
        $term = new TermResource($term);
        return $this->success($term, 'status updated');
    }

    public function destroy(Term $term)
    {
        $term->delete();
        return $this->success(null, 'term deleted', 204);
    }

    public function deleted()
    {
        $terms = TermResource::collection(Term::onlyTrashed()->paginate());
        return $this->success($terms, 'terms retrieved');
    }

    public function restore($term)
    {
        Term::onlyTrashed()->find($term)->restore();
        return $this->success(null, 'term restore', 204);
    }

    public function forceDelete($term)
    {
        Term::onlyTrashed()->find($term)->forceDelete();
        return $this->success(null, 'term permanently deleted', 204);
    }
}

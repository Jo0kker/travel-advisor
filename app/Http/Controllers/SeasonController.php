<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeasonRequest;
use App\Http\Resources\SeasonResource;
use App\Models\Season;

class SeasonController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Season::class);

        return SeasonResource::collection(Season::all());
    }

    public function store(SeasonRequest $request)
    {
        $this->authorize('create', Season::class);

        return new SeasonResource(Season::create($request->validated()));
    }

    public function show(Season $season)
    {
        $this->authorize('view', $season);

        return new SeasonResource($season);
    }

    public function update(SeasonRequest $request, Season $season)
    {
        $this->authorize('update', $season);

        $season->update($request->validated());

        return new SeasonResource($season);
    }

    public function destroy(Season $season)
    {
        $this->authorize('delete', $season);

        $season->delete();

        return response()->json();
    }
}

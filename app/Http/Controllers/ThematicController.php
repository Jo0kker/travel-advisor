<?php

namespace App\Http\Controllers;

use App\Http\Requests\ThematicRequest;
use App\Http\Resources\ThematicResource;
use App\Models\Thematic;

class ThematicController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Thematic::class);

        return ThematicResource::collection(Thematic::all());
    }

    public function store(ThematicRequest $request)
    {
        $this->authorize('create', Thematic::class);

        return new ThematicResource(Thematic::create($request->validated()));
    }

    public function show(Thematic $thematic)
    {
        $this->authorize('view', $thematic);

        return new ThematicResource($thematic);
    }

    public function update(ThematicRequest $request, Thematic $thematic)
    {
        $this->authorize('update', $thematic);

        $thematic->update($request->validated());

        return new ThematicResource($thematic);
    }

    public function destroy(Thematic $thematic)
    {
        $this->authorize('delete', $thematic);

        $thematic->delete();

        return response()->json();
    }
}

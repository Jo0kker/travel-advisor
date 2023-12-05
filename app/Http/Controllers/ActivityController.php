<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Activity::class);

        return ActivityResource::collection(Activity::all());
    }

    public function store(ActivityRequest $request)
    {
        $this->authorize('create', Activity::class);

        return new ActivityResource(Activity::create($request->validated()));
    }

    public function show(Activity $activity)
    {
        $this->authorize('view', $activity);

        return new ActivityResource($activity);
    }

    public function update(ActivityRequest $request, Activity $activity)
    {
        $this->authorize('update', $activity);

        $activity->update($request->validated());

        return new ActivityResource($activity);
    }

    public function destroy(Activity $activity)
    {
        $this->authorize('delete', $activity);

        $activity->delete();

        return response()->json();
    }
}

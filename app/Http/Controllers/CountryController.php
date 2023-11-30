<?php

namespace App\Http\Controllers;

use App\Http\Resources\countryResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Country::class);

        return countryResource::collection(country::all());
    }

    public function store(Request $request)
    {
        $this->authorize('create', Country::class);

        $request->validate([
            'name' => ['required'],
        ]);

        return new countryResource(Country::create($request->validated()));
    }

    public function show(Country $country)
    {
        $this->authorize('view', $country);

        return new CountryResource($country);
    }

    public function update(Request $request, Country $country)
    {
        $this->authorize('update', $country);

        $request->validate([
            'name' => ['required'],
        ]);

        $country->update($request->validated());

        return new CountryResource($country);
    }

    public function destroy(Country $country)
    {
        $this->authorize('delete', $country);

        $country->delete();

        return response()->json();
    }
}

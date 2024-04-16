<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyStoreRequest;
use App\Http\Resources\PropertyResources;
use App\Models\Property;
use Illuminate\Http\Response;

class PropertyController extends Controller
{

    public function index()
    {
        return PropertyResources::collection(Property::all());
    }

    public function store(PropertyStoreRequest $request)
    {
        return Property::create($request->validated());
    }

    public function show(Property $property)
    {
        return new PropertyResources($property);
    }

    public function update(PropertyStoreRequest $request, Property $offer)
    {
        $offer->update($request->validated());
        return $offer;
    }

    public function destroy(Property $offer)
    {
        $offer->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

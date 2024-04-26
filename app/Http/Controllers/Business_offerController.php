<?php

namespace App\Http\Controllers;

use App\Http\Resources\Business_offerResources;
use App\Http\Resources\PropertyResources;
use App\Models\Business_offer;
use Illuminate\Http\Response;
use App\Http\Requests\Business_offerStoreRequest;

class Business_offerController extends Controller
{

    public function index()
    {
        return Business_offerResources::collection(Business_offer::all());
    }

    public function store(Business_offerStoreRequest $request)
    {
        return Business_offer::create($request->validated());
    }

    public function show(int $id)
    {
        return new PropertyResources(Business_offer::findOrFail($id));
    }

    public function update(Business_offerStoreRequest $request, Business_offer $offer)
    {
        $offer->update($request->validated());
        return $offer;
    }

    public function destroy(Business_offer $offer)
    {
        $offer->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}

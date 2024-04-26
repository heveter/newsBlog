<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaStoreRequest;
use App\Http\Resources\MediaResources;
use App\Models\Media;
use Illuminate\Http\Response;
use App\Http\Requests\NewsStoreRequest;

class MediaController extends Controller
{

    public function index()
    {
        return MediaResources::collection(Media::all());
    }

    public function store(NewsStoreRequest $request)
    {
        return Media::create($request->validated());
    }

    public function show(int $id)
    {
        return new MediaResources(Media::findOrFail($id));
    }

    public function update(MediaStoreRequest $request, Media $media)
    {
        $media->update($request->validated());
        return $media;
    }

    public function destroy(Media $media)
    {
        $media->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}

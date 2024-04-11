<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsResources;
use App\Models\Media;
use App\Models\News;
use Illuminate\Http\Response;
use Session;
use App\Http\Requests\NewsStoreRequest;

class NewsController extends Controller
{

    public function index()
    {
        $itemsPerPage = 6;
        return NewsResources::collection(News::orderBy('created_at', 'desc')->paginate($itemsPerPage));
    }

    public function store(NewsStoreRequest $request)
    {
        return News::create($request->validated());
    }

    public function show(News $news)
    {
        return new NewsResources($news);
    }

    public function update(NewsStoreRequest $request, News $news)
    {
        $news->update($request->validated());
        return $news;
    }

    public function destroy(News $news)
    {
        $news->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}

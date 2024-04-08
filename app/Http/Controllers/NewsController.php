<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class NewsController extends Controller
{

    public function index()
    {
        // using paginate function to show 3 news items per page
        $itemsPerPage = 6;
        $news = News::orderBy('created_at', 'desc')->paginate($itemsPerPage);

        return ('news.index', array('news' => $news, 'title' => 'News Display'));
    }

    public function create()
    {
        return view('news.create', array('title' => 'Add News'));
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
                'title' => 'required',
                'slug' => 'required',
                'short_description' => 'required',
                'full_content' => 'required',
            )
        );

        $input = $request->all();
        //dd($input); // dd() helper function is print_r alternative

        News::create($input);

        Session::flash('flash_message', 'News added successfully!');

        //return redirect()->back();
        //return redirect('news');
        return redirect()->route('news.index');
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();
        return view('news.show', array('news' => $news));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('news.edit', array('news' => $news, 'title' => 'Edit News'));
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        $news->delete();

        Session::flash('flash_message', 'News deleted successfully!');

        return redirect()->route('news.index');
    }
}

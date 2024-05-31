<?php

namespace App\Http\Controllers;

use App\WorkAndNews;
use App\WorkDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(ADMIN_RESOURCE . 'news.list');
    }

    public function list()
    {
        return Datatables::of(WorkAndNews::query()->where('type', NEWS)->orderBy('id', 'desc'))->addColumn('action', function ($news) {
            $deleteUrl = "'" . route('news.destroy', $news->id) . "'";
            $editUrl = route('news.edit', $news->id);
            return '<div class="btn-group " role="group">
                        <a class="p-0-6" role="button" href="' . $editUrl . '"><i class="feather icon-edit h4 text-success"></i></a>    
                        <a class="p-0-6" role="button"  onclick="confirmDelete(' . $deleteUrl . ',this)"><i class="feather icon-trash-2 h4 text-danger"></i></a>
                    </div>';
        })->addColumn('status', function ($news) {
            return  unserialize(STATUS_ARRAY)[$news->status];
        })->escapeColumns([])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $works = WorkAndNews::works()->where('status', 1)->get();

        return view(ADMIN_RESOURCE . 'news.create', compact('works'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:work_and_news,title',
            'caption' => 'required',
            'news_date' => 'required',
        ]);

        $news = WorkAndNews::create([
            'type' => NEWS,
            'size' => 'medium',
            'title' => $request->title,
            'caption' => $request->caption,
            'news_date' => Carbon::parse($request->news_date),
            'show_on_home' => $request->show_on_home ?? 0,
            'detail' => $request->detail,
            'image' => $request->image,
            'bg_color' => $request->bg_color,
            'bg_hover_color' => $request->bg_hover_color,
            'line_color' => $request->line_color,
            'line_hover_color' => $request->line_hover_color,
            'anchor_color' => $request->anchor_color,
            'anchor_hover_color' => $request->anchor_hover_color,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status ?? 0,
            'seo_url' => $request->seo_url != '' ? $request->seo_url : 'news.'.$this->generateSeoURL($request->title),
        ]);

        if ($news) {
            return redirect()->route('news.index')->with('success', 'News Created Successfully.');
        } else {
            return redirect()->back()->with('error', '!Oops something went wrong please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WorkAndNews  $workAndNews
     * @return \Illuminate\Http\Response
     */
    public function show(WorkAndNews $workAndNews)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WorkAndNews  $workAndNews
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = WorkAndNews::findOrFail($id);
        $works = WorkAndNews::works()->where('status', 1)->get();
        return view(ADMIN_RESOURCE . 'news.edit', compact('news','works'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WorkAndNews  $workAndNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $news = WorkAndNews::findOrFail($id);

        $request->validate([
            'title' => "required|unique:work_and_news,title,$news->id",
            'caption' => 'required',
            'news_date' => 'required',
        ]);


        $news->type = NEWS;
        $news->size = 'medium';
        $news->title = $request->title;
        $news->caption = $request->caption;
        $news->news_date = Carbon::parse($request->news_date);
        $news->show_on_home = $request->show_on_home ?? 0;
        $news->detail = $request->detail;
        $news->image = $request->image;
        $news->bg_color = $request->bg_color;
        $news->bg_hover_color = $request->bg_hover_color;
        $news->line_color = $request->line_color;
        $news->line_hover_color = $request->line_hover_color;
        $news->anchor_color = $request->anchor_color;
        $news->anchor_hover_color = $request->anchor_hover_color;
        $news->show_on_home = $request->show_on_home ?? 0;
        $news->detail = $request->detail;
        $news->image = $request->image;
        $news->sort_order = $request->sort_order ?? 0;
        $news->status = $request->status ?? 0;
        $news->seo_url = $request->seo_url != '' ? $request->seo_url : 'news.'.$this->generateSeoURL($request->title);


        if ($news->save()) {
            return redirect()->route('news.index')->with('success', 'News Updated Successfully.');
        } else {
            return redirect()->back()->with('error', '!Oops something went wrong please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WorkAndNews  $workAndNews
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status =  WorkAndNews::findOrFail($id)->delete();
        return response()->json(['status' => $status]);
    }
}

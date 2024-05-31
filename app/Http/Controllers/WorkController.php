<?php

namespace App\Http\Controllers;

use App\WorkAndNews;
use App\WorkDetail;
use Illuminate\Http\Request;
use DataTables;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(ADMIN_RESOURCE . 'work.list');
    }

    public function list()
    {
        return Datatables::of(WorkAndNews::query()->where('type', WORK))->addColumn('action', function ($work) {
            $deleteUrl = "'" . route('work.destroy', $work->id) . "'";
            $editUrl = route('work.edit', $work->id);
            $layout = route('work.layout', $work->id);
            return '<div class="btn-group " role="group">
                        <a class="p-0-6" role="button" href="' . $layout . '" target="_blank"><i class="feather icon-layout h4 text-primary"></i></a>
                        <a class="p-0-6" role="button" href="' . $editUrl . '"><i class="feather icon-edit h4 text-success"></i></a>    
                        <a class="p-0-6" role="button"  onclick="confirmDelete(' . $deleteUrl . ',this)"><i class="feather icon-trash-2 h4 text-danger"></i></a>
                    </div>';
        })->addColumn('image', function ($work) {
            return  '<img src="' . $work->image . '" width="80" height="80" class="imag-thumbnail"></img>';
        })->addColumn('status', function ($work) {
            return  unserialize(STATUS_ARRAY)[$work->status];
        })->escapeColumns([])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(ADMIN_RESOURCE . 'work.create');
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
            'year' => 'required',
        ]);

        $work = WorkAndNews::create([
            'type' => 0,
            'title' => $request->title,
            'caption' => $request->caption,
            'size' => $request->size,
            'year' => $request->year,
            'show_on_home' => $request->show_on_home ?? 0,
            'detail' => $request->detail,
            'image' => $request->image,
            'sort_order' => $request->sort_order ?? 0,
            'status' => $request->status ?? 0,
            'seo_url' => $this->generateSeoURL($request->title),
        ]);

        if ($work) {
            if ($request->thumbnail) {
                $data = $this->fillAble($request->thumbnail, $work->id);
                $work->thumbnails()->insert($data);
            }
            if ($request->video) {
                $data = $this->fillAble($request->video, $work->id);
                $work->videos()->insert($data);
            }
            return redirect()->route('work.index')->with('success', 'Work Created Successfully.');
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
        $work = WorkAndNews::findOrFail($id);
        return view(ADMIN_RESOURCE . 'work.edit', compact('work'));
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

        $work = WorkAndNews::findOrFail($id);

        $request->validate([
            'title' => "required|unique:work_and_news,title,$work->id",
            'caption' => 'required',
            'year' => 'required',
        ]);


        $work->type = WORK;
        $work->title = $request->title;
        $work->caption = $request->caption;
        $work->size = $request->size;
        $work->year = $request->year;
        $work->show_on_home = $request->show_on_home ?? 0;
        $work->detail = $request->detail;
        $work->image = $request->image;
        $work->sort_order = $request->sort_order ?? 0;
        $work->status = $request->status ?? 0;
        $work->seo_url = $this->generateSeoURL($request->title);


        if ($work->save()) {

            if ($request->thumbnail) {

                $work->thumbnails()->delete();

                $data = $data = $this->fillAble($request->thumbnail, $work->id);
                $work->thumbnails()->insert($data);
            }
            if ($request->video) {

                $work->videos()->delete();

                $data = $data = $this->fillAble($request->video, $work->id);
                $work->videos()->insert($data);
            }
            return redirect()->route('work.index')->with('success', 'Work Updated Successfully.');
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


    public function layout($id)
    {
        $thumbnails = WorkDetail::where([['work_and_news_id', $id], ['type', 1]])->orderBy('sort_order', 'asc')->get();
        return view(ADMIN_RESOURCE . 'work.layout', compact('thumbnails', 'id'));
    }


    public function saveLayout(Request $request, $id)
    {
        // dd($request->sort);
        $work = WorkAndNews::findOrFail($id);

        foreach ($request->sort as $key => $value) {
            $work->thumbnails()->where('id', $key)->update(['sort_order' => $value]);
        }

        return redirect()->back()->with('success', 'Work Updated Successfully.');
    }



    public function fillAble($data, $id)
    {
        return collect($data)->map(function ($item) use ($id) {
            $item['work_and_news_id'] = $id;

            // if ($item['type'] == 1 && $item['size'] == 'small') {
            //     $item['image'] .= '|X|X|' . $item['small'];
            // }
            // unset($item['small']);
            return $item;
        })->toArray();
    }
}

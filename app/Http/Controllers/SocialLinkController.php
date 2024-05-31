<?php

namespace App\Http\Controllers;

use App\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = SocialLink::all();

        return view(ADMIN_RESOURCE . 'social.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'contacts.*' => 'required'
        ]);
        // dd($request->all());
        DB::table('social_links')->truncate();
        $social = SocialLink::insert($request->contacts);

        if ($social) {
            return redirect()->route('social-links.index')->with('success', 'Social Links updated Successfully.');
        } else {
            return redirect()->back()->with('error', '!Oops something went wrong please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function show(SocialLink $socialLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialLink $socialLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialLink $socialLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SocialLink  $socialLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialLink $socialLink)
    {
        //
    }
}

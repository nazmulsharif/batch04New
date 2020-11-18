<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAboutSection;
use Auth;
use DB;
class HomeAboutSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutSections = HomeAboutSection::all();
        return view('backEnd.admin.pages.homeAboutSection.index', compact('aboutSections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.admin.pages.homeAboutSection.create');
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
            'title'=>'required',
            'sub_title'=>'required',
            'description'=>'required',
            'list'=>'required',
            'final_desc'=>'required'
        ]);
        $about = new HomeAboutSection();
        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->description = $request->description;
        $about->final_desc = $request->final_desc;
        $list = implode('<>', $request->list);
        $about->list = $list;
        $about->user_id = Auth::user()->id;
        $about->save();
        return back()->with('message','About Section is added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function statusChange($id,$status){

        DB::table('home_about_sections')->update([
            'status' => 0

        ]);
        $about = HomeAboutSection::find($id);
        if($status == 1){
            $about->status =0;
        }
        else{
            $about->status =1 ;
        }
        $about->save();
        return back()->with('message','About Section status is updated succesfully');
    }
}

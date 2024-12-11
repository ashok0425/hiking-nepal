<?php

namespace App\Http\Controllers\BackEnd\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Cms;
use App\Models\ImageUpload;
use DB;
use File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CmsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cms_pages = Cms::orderBy('id','desc')->get();
        return view('admin.cms.index',compact('cms_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maincms = Cms::where('main_or_sub', 1)->get();
        return view('admin.cms.create',compact('maincms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = $this->toAscii($request->title);

        $this->validate($request, [
            'title' => 'required|min:3|max:255|unique:cms'
        ]);

        try {
            $cms = new Cms;
            $cms->title = $request->title;
            $cms->meta_title = $request->meta_title;
            $cms->keyword = $request->keyword;
            $cms->meta_description = $request->meta_description;
            $cms->status = 1;
            $cms->main_or_sub = $request->main_or_sub;
            $cms->parent_id = $request->main_or_sub ? 0 : $request->parent_id;
            $cms->url = $url;
            $cms->content = $request->content;
           $cms->hide_header = $request->hide_header??0;
            $cms->position = $request->position;
            $file=$request->file('file');
            if($file){
                $cms->image =$this->uploadFile('upload/cms',$file);

            }
            $cms->save();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully  CMS page created.',
               
             );
        } catch (QueryException $e) {
          
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to create cms page, Try again.',
               
             );
        }

        return redirect()->route('admin.cms.index')->with($notification);
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
        $menu = Cms::findOrFail($id);
        $maincms= Cms::where('main_or_sub', 1)->get();

        return view('admin.cms.edit', compact('menu','maincms'));
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
        $url = $this->toAscii($request->title);

        $this->validate($request, [
            'title' => 'required|min:3|max:255|unique:cms,title,'. $id
        ]);

        try {
            // dd($request->all());
            $cms = Cms::findOrFail($id);
            $cms->title = $request->title;
            $cms->status = 1;
            $cms->meta_title = $request->meta_title;
            $cms->keyword = $request->keyword;
            $cms->meta_description = $request->meta_description;
            $cms->main_or_sub = $request->main_or_sub;
            $cms->parent_id = $request->main_or_sub ? 0 : $request->parent_id;
            $cms->url = $url;
            $cms->content = $request->content;
           $cms->hide_header = $request->hide_header??0;
            $cms->position = $request->position;
            $file=$request->file('file');
            if($file){
                $cms->image =$this->uploadFile('upload/cms',$file);

            }
            $cms->save();
            
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully updated CMS page .',
               
             );
        } catch (QueryException $e) {
            
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to update CMS page ',
               
             );
        }

        return redirect()->route('admin.cms.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $cms = Cms::findOrFail($id);  
            $cms->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully deleted cms page.',
             );
        } catch (QueryException $e) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to create cms page, Try again.',
               
             );
        }

        return redirect()->route('admin.cms.index')->with($notification);
    }

    private function toAscii($str) {
        $clean = preg_replace('~[^\\pL\d]+~u', '-', $str);
        $clean = strtolower(trim($clean, '-'));

        return $clean;
    }
}

<?php

namespace App\Http\Controllers\BackEnd\Travel;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Faq;
use App\Models\Package;
use App\Models\PackageImage;
use Illuminate\Http\Request;

class PackagesGalleryController extends Controller
{
    public $status_message = null;
    public $alert_type = "success";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = PackageImage::orderBy('created_at', 'desc')->where('package_id',request()->query('package_id'))->get();
        return view('admin.gallery.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //code...

        try {
            $banner = $request->file('thumbnail');
            if ($banner) {
                $path = $this->uploadFile('upload/package/gallery', $banner);
            }
            $gallery = new PackageImage;
            $gallery->package_id=$request->package_id;
            $gallery->image=$path;
            $gallery->save();

            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Image Added Successfully',

             );
            } catch (\Throwable $th) {
                //throw $th;

            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to Add Image, Try again.',

             );
        }

        return redirect()->back()->with($notification);
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
        $gallery=PackageImage::findorFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        try {
            $banner = $request->file('thumbnail');
            if ($banner) {
                $path = $this->uploadFile('upload/package/gallery', $banner);
            }
            $gallery = PackageImage::findorFail($request->id);
            $gallery->image=$path??$gallery->image;
            $gallery->save();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Image updated',

             );
        } catch(\Throwable $e) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to update Image, Try again.',

             );
        }

        return redirect()->back()->with($notification);
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
            $faq = PackageImage::findOrFail($id);
            // $faq->packages()->detach();
            $faq->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>' Image Deleted',

             );
        } catch (\Throwable $e) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to delete FAQ, Try again.',

             );

    }
    return redirect()->back()->with($notification);

}
}

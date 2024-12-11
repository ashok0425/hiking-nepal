<?php

namespace App\Http\Controllers\backEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainSlider;
use File;
use App\Http\Traits\status;
class BannerController extends Controller
{
    use status;

    public function index(){
        $banners=MainSlider::all();
        return view('admin.banner.index',compact('banners'));
    }


    public function create(){
        return view('admin.banner.create');
    }

    public function store(Request $request){
        $main_sliders=new MainSlider;
        $request->validate([
            'image'=>'required',
            'title'=>'required',
            'type'=>'required',

            
        ]);
        $file=$request->file('image');

        if($file){
            $main_sliders->image=$this->uploadFile('upload/mainslider',$file);
                }
        $main_sliders->title=$request->title;
        $main_sliders->details=$request->details;
        $main_sliders->type=$request->type;
        $main_sliders->status=1;

        $main_sliders->link=$request->link;

            $main_sliders->save();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Banner Added',

            );
          return redirect()->back()->with($notification);
    }



    public function edit($id){
        $banner=MainSlider::find($id);
        return view('admin.banner.edit',compact('banner'));
    }


    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required',
            'type'=>'required',

            
        ]);
        $main_sliders=MainSlider::find($id);

        $file=$request->file('file');

        $file=$request->file('image');

        if($file){
            $this->deleteFile($main_sliders->image);
            $main_sliders->image=$this->uploadFile('upload/mainslider',$file);
                }
        $main_sliders->title=$request->title;
        $main_sliders->details=$request->details;
        $main_sliders->type=$request->type;
        $main_sliders->status=1;

        $main_sliders->link=$request->link;

            $main_sliders->save();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Main Banner updated',

            );
            return redirect()->route('admin.banners.index')->with($notification);

}

 public function show()
{
    # code...
}

public function destroy($id)
{
    try {
        $main_sliders = MainSlider::findOrFail($id);
        $this->deleteFile($main_sliders->image);
        $main_sliders->delete();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Successfully Deleted Banner.',
           
         );
    } catch (\Throwable $e) {
        $notification=array(
            'alert-type'=>'error',
            'messege'=>'Failed to delete  Banner.',
           
         );
    }

    return redirect()->route('admin.banners.index')->with($notification);
}

}

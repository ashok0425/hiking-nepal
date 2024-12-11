<?php

namespace App\Http\Controllers\BackEnd\Travel;

use App\Models\Category;
use App\Models\CategoryDestination;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryPlace;
use App\Models\Destination;
use Intervention\Image\Facades\Image;
use Illuminate\Database\QueryException;
use File;
class CategoriesPlacesController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = CategoryPlace::orderBy('created_at', 'desc')->get();

        return view('admin.place.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations= Destination::all();
        return view('admin.place.create',compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $url = $this->toAscii($request->name);
        $request['url'] = $url;
        $this->validate($request, [
            'name' => 'required|min:3|max:255|unique:categories_destinations'
        ]);

        try {
            DB::beginTransaction();
            $category = new CategoryPlace;
            $category->name = $request->name;
            $category->status = 1;
            $category->details = $request->details;
            $category->url = $request->url;
            $category->destination_id = $request->destination;
            $category->meta_title = $request->meta_title;
            $category->meta_keyword = $request->meta_keyword;
            $category->meta_description = $request->meta_description;

            $file=$request->file('file');
            
            if($file){
                $category->image=$this->uploadFile('upload/category',$file);
            }
            $category->save();

            DB::commit();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully created category.',
               
             );
      
        } catch (QueryException $e) {
            return $e->getMessage();
            DB::rollback();
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to create category, Try again.',
               
             );
        }

        return redirect()->route('admin.categories-places.index')->with($notification);
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
        $data['category'] = CategoryPlace::findOrFail($id);
        $data['destinations'] = Destination::all();

        return view('admin.place.edit', $data);
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
        $url = $this->toAscii($request->name);
        $request['url'] = $url;

        $this->validate($request, [
            'name' => 'required|min:3|max:255|',
        ]);
        try {
            // DB::beginTransaction();
            $category =  CategoryPlace::find($id);
            $category->name = $request->name;
            $category->status = 1;
            $category->details = $request->details;
            $category->url = $request->url;
            $category->destination_id = $request->destination;
            $category->meta_title = $request->meta_title;
            $category->meta_keyword = $request->meta_keyword;
            $category->meta_description = $request->meta_description;
            $file=$request->file('file');
            
            if($file){
                $this->deleteFile($category->image);
                $category->image=$this->uploadFile('upload/category',$file);
            }
            $category->save();

            // DB::commit();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully updated category.',
               
             );
        } catch (QueryException $e) {
            return $e->getMessage();
            DB::rollback();
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to updated category, Try again.',
               
             );
        }
        return redirect()->route('admin.categories-places.index')->with($notification);
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
            $destination = CategoryPlace::findOrFail($id);
            $this->deleteFile($destination->image);
            $destination->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully deleted destinations.',
               
             );
       
        } catch (QueryException $e) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to delete destination, Try again.',
               
             );
        }

        return redirect()->back()->with($notification);
    }
  


    private function toAscii($str) {
        $clean = preg_replace('~[^\\pL\d]+~u', '-', $str);
        $clean = strtolower(trim($clean, '-'));

        return $clean;
    }
}

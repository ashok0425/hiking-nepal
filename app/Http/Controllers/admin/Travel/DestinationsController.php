<?php

namespace App\Http\Controllers\BackEnd\Travel;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\AllImage;
use App\Models\Destination;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use File;
class DestinationsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['destinations']= Destination::orderBy('id', 'desc')->get();
        return view('admin.destinations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.destinations.create');
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
            'name' => 'required|min:3|max:255|unique:destinations'
        ]);
        try {
            DB::beginTransaction();
            $destination = new Destination;
            $destination->name = $request->name;
            $destination->status = 1;
            $destination->details = $request->details;
            $destination->url = $request->url;
            $destination->meta_title = $request->meta_title;
            $destination->meta_keyword = $request->meta_keyword;
            $destination->meta_description = $request->meta_description;
                $file=$request->file('file');
            
                if($file){
                    $destination->image=$this->uploadFile('upload/destination',$file);

                }
             $destination->save();
            DB::commit();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully created destination.',
               
             );
        } catch (QueryException $e) {
            DB::rollback();
            return $e->getMessage();
        
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to create destination, Try again.',
               
             );
        }

        return redirect()->route('admin.destinations.index')->with($notification);
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
        $data['destination'] = Destination::findOrFail($id);
        return view('admin.destinations.edit', $data);
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
            'name' => 'required|min:3|max:255|'
        ]);
        try {
            DB::beginTransaction();
            $destination = Destination::find($id);
            $destination->name = $request->name;
            $destination->status = 1;
            $destination->details = $request->details;
            $destination->url = $request->url;
            $destination->meta_title = $request->meta_title;
            $destination->meta_keyword = $request->meta_keyword;
            $destination->meta_description = $request->meta_description;
                $file=$request->file('file');
                if($file){
                  
                    $this->deleteFile($destination->image);
                    $destination->image=$this->uploadFile('upload/destination',$file);
                }
             $destination->save();
            DB::commit();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully created destination.',
               
             );
        } catch (QueryException $e) {
            DB::rollback();
            return $e->getMessage();
      
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to create destination, Try again.',
               
             );
        }

        return redirect()->route('admin.destinations.index')->with($notification);
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
            $destination = Destination::findOrFail($id);
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

<?php

namespace App\Http\Controllers\BackEnd\Main;

use App\Models\SectionControl;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class SectionControlController extends Controller
{
    private $status_message = NULL;
    private $alert_type = "success";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = SectionControl::orderBy('id')->get();

        return view('admin.section-control.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.section-control.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $section = SectionControl::findOrFail($id);

        return view('admin.section-control.edit', compact('section'));
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
        try {
           $section= SectionControl::findOrFail($id);
           $section->display_name=$request->display_name;
           $section->status=1;
           $section->details=$request->details;
             $section->save();

             $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully updated Section Control.',
               
             );
        } catch (QueryException $e) {
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Failed to update Section Control',
               
             );
        }

        return redirect()->route('admin.section-control.index')->with($notification);
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
}

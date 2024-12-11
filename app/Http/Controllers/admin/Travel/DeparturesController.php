<?php

namespace App\Http\Controllers\BackEnd\Travel;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Departure;
use App\Models\Package;
use Illuminate\Http\Request;

class DeparturesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departures = Departure::orderBy('created_at', 'desc')->paginate(500);
        return view('admin.departure.index',compact('departures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages=Package::orderBy('name')->where('status',1)->get();

        return view('admin.departure.create', compact('packages'));
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
            'package_id'=>'required',
            'start_date'=>'required',

        ]);
            //code...
        try {
            foreach ($request->start_date as $key => $date) {
                $Departure = new Departure;
                $Departure->start_date=$date;
                $Departure->package_id=$request->package_id;
                $Departure->status=1;
                $Departure->save();
            }


            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Departure Added Successfully',

             );
            } catch (\Throwable $th) {
                //throw $th;

            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to Add Departure, Try again.',

             );
        }

        return redirect()->route('admin.departures.index')->with($notification);
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
        $departure = Departure::findOrFail($id);
        $packages=Package::where('status',1)->orderBy('name')->get();
        return view('admin.departure.edit', compact('departure','packages'));
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
            $Departure = Departure::findOrFail($id);
            $Departure->start_date=$request->start_date;
            $Departure->package_id=$request->package_id;
            $Departure->save();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Departure updated',
             );
        } catch(\Throwable $e) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to update Departure, Try again.',

             );
        }

        return redirect()->route('admin.departures.index')->with($notification);
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
            $Departure = Departure::findOrFail($id);
            // $Departure->packages()->detach();
            $Departure->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>' Departure Deleted',

             );
        } catch (\Throwable $e) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to delete Departure, Try again.',
             );

    }
    return redirect()->route('admin.departures.index')->with($notification);

}
}

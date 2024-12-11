<?php

namespace App\Http\Controllers\BackEnd\Travel;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Departure;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeparturesController extends Controller
{
    private $status_message = NULL;
    private $alert_type = "success";


    public function index(Request $request)
    {
        // dd($request->all());
        // $data['departures'] = Departure::orderBy('created_at','desc')->get();
$packages= Package::where('status',1)->pluck('name','id');
        if($request->search_input || $request->package_id){
            $departures=Departure::where('package_id',$request->package_id)->where('start_date', '>=', Carbon::today())->orderBy('start_date')->paginate(500);
        // dd($departures);
        }else{
            $departures = Departure::where('start_date', '>=', Carbon::today())->orderBy('start_date')->paginate(500);
            // $departures=Departure::paginate(500);
        }
        return view('admin.travel.departures.index', compact('departures','packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['departure'] = false;
        $data['packages'] = Package::where('status',1)->pluck('name','id');

        return view('admin.travel.departures.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $departure = Departure::create($request->all());
            DB::commit();
            $this->status_message = "Successfully created departure.";
        } catch (QueryException $e) {
            DB::rollback();
            return $e->getMessage();
            $this->status_message = "Failed to create departure, Try again.";
            $this->alert_type = "danger";
        }

        return redirect()->route('admin.departures.index')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
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
        $data['departure'] = Departure::findOrFail($id);
        // $data['packages'] = Package::where('status',1)->where('id',$data['departure']->package_id)->pluck('name','id');
        $data['packages'] = Package::where('status',1)->pluck('name','id');
        // $data['packages'] = $data['departure']->package->pluck('name','id');
        // $data['packages'] = $data['departure']->package->select('id')->get()->toArray();
        
        // dd($data['packages']);

        return view('admin.travel.departures.edit', $data);
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
            DB::beginTransaction();
            $departure = Departure::findOrFail($id);
            $departure->update($request->all());
            DB::commit();
            $this->status_message = "Successfully created departure.";
        } catch (QueryException $e) {
            DB::rollback();
            return $e->getMessage();
            $this->status_message = "Failed to update departure, Try again.";
            $this->alert_type = "danger";
        }

        return redirect()->route('admin.departures.index')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);

        return redirect()->back()->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
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
            $departure = Departure::findOrFail($id);
            $departure->delete();

            $this->status_message = "Successfully deleted departures.";
        } catch (QueryException $e) {
            $this->status_message = "Failed to delete departures, Try again.";
            $this->alert_type = "danger";
        }

        return redirect()->back()->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
    }

   
   
}

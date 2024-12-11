<?php

namespace App\Http\Controllers\BackEnd\ImportantLinks;

use App\Models\ImportantLink;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class ImportantLinksController extends Controller
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
        $data['important_links'] = ImportantLink::orderBy('created_at', 'desc')->get();

        return view('admin.important_links.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.important_links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            ImportantLink::create($request->all());

            $this->status_message = "Successfully created important link.";
        } catch (QueryException $e) {
            $this->status_message = "Failed to create important link, Try again.";
            $this->alert_type = "danger";
        }

        return redirect()->route('admin.important-links.index')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
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
        $data['important_link'] = ImportantLink::findOrFail($id);

        return view('admin.important_links.edit', $data);
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
            ImportantLink::findOrFail($id)->update($request->all());

            $this->status_message = "Successfully updated important link.";
        } catch (QueryException $e) {
            $this->status_message = "Failed to update important link, Try again.";
            $this->alert_type = "danger";
        }
        
        return redirect()->route('admin.important-links.index')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
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
            ImportantLink::destroy($id);

            $this->status_message = "Successfully deleted important link.";
        } catch (QueryException $e) {
            $this->status_message = "Failed to delete important link, Try again.";
            $this->alert_type = "danger";
        }
        return redirect()->route('admin.important-links.index')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
    }
}

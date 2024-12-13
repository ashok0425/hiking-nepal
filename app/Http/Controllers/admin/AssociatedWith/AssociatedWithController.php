<?php

namespace App\Http\Controllers\Admin\AssociatedWith;

use App\Http\Controllers\Controller;
use App\Models\AssociatedWith;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AssociatedWithController extends Controller
{
    private $status_message = null;

    private $alert_type = 'success';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['associated_with'] = AssociatedWith::orderBy('created_at', 'desc')->get();

        return view('admin.associated_with.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.associated_with.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            AssociatedWith::create($request->all());

            $this->status_message = 'Successfully created associated with link.';
        } catch (QueryException $e) {
            $this->status_message = 'Failed to create associated with link, Try again.';
            $this->alert_type = 'danger';
        }

        return redirect()->route('admin.associated-with.index')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
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
        $data['associated_with'] = AssociatedWith::findOrFail($id);

        return view('admin.associated_with.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            AssociatedWith::findOrFail($id)->update($request->all());

            $this->status_message = 'Sucessfully updated associated with.';
        } catch (QueryException $e) {
            $this->status_message = 'Failed to update associated with, Try again.';
            $this->alert_type = 'danger';
        }

        return redirect()->route('admin.associated-with.index')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
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
            AssociatedWith::destroy($id);

            $this->status_message = 'Successfully deleted associated with.';
        } catch (QueryException $e) {
            $this->status_message = 'Failed to delete associated with, Try again.';
            $this->alert_type = 'danger';
        }

        return redirect()->route('admin.associated-with.index')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
    }
}

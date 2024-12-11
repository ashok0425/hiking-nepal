<?php

namespace App\Http\Controllers\BackEnd\Travel;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Faq;
use App\Models\Package;
use Illuminate\Http\Request;

class FaqsController extends Controller
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
        $faqs = Faq::orderBy('created_at', 'desc')->get();
        return view('admin.faq.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages=Package::orderBy('name')->where('status',1)->get();

        return view('admin.faq.create', compact('packages'));
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
            $faq = new Faq;
            $faq->question=$request->question;
            $faq->answer=$request->answer;
            $faq->package_id=$request->package_id;
            $faq->status=1;
            $faq->show_on_home_page=$request->show_on_home_page??0;

            $faq->save();

            $notification=array(
                'alert-type'=>'success',
                'messege'=>'FAQ Added Successfully',

             );
            } catch (\Throwable $th) {
                //throw $th;

            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to Add FAQ, Try again.',

             );
        }

        return redirect()->route('admin.faqs.index')->with($notification);
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
        $faq = Faq::findOrFail($id);
        $packages=Package::where('status',1)->orderBy('name')->get();
        return view('admin.faq.edit', compact('faq','packages'));
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
            $faq = Faq::findOrFail($id);
            $faq->question=$request->question;
            $faq->answer=$request->answer;
            $faq->package_id=$request->package_id;
            $faq->status=1;
            $faq->show_on_home_page=$request->show_on_home_page??0;
            $faq->save();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Faq updated',

             );
        } catch(\Throwable $e) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to pdate FAQ, Try again.',

             );
        }

        return redirect()->route('admin.faqs.index')->with($notification);
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
            $faq = Faq::findOrFail($id);
            // $faq->packages()->detach();
            $faq->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>' FAQ Deleted',

             );
        } catch (\Throwable $e) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to delete FAQ, Try again.',

             );

    }
    return redirect()->route('admin.faqs.index')->with($notification);

}
}

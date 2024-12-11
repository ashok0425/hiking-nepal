<?php

namespace App\Http\Controllers\BackEnd\Testimonials;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Package;
use App\Models\Testimonial;
use App\Models\PackageTestimonial;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class TestimonialsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::where('status', 1)->get();
        return view('admin.testimonials.create', compact('packages'));
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
            DB::beginTransaction();
            $testimonials = new  Testimonial;
            $testimonials->name = $request->name;
            $testimonials->title = $request->title;
            $testimonials->content = $request->content;
            $testimonials->status = 1;
            $testimonials->rating = $request->rating;

            $testimonials->display_home = $request->display_home;
            $testimonials->date = $request->date;

            $banner = $request->file('file');
            if ($banner) {
                $testimonials->image =$this->uploadFile('upload/testimonial',$banner);

            }
            if ($testimonials->save()) {
                $length = count($request->package);
                for ($i = 0; $i < $length; $i++) {
                    $package_testmonial = [];
                    $package_testmonial['package_id'] = $request->package[$i];
                    $package_testmonial['testimonial_id'] = $testimonials->id;
                    DB::table('package_testimonial')->insert($package_testmonial);
                }
            }

DB::commit();

            $notification = array(
                'alert-type' => 'success',
                'messege' => 'Successfully Added Testimonial.',

            );
        } catch (QueryException $qE) {
DB::rollBack();
            $notification = array(
                'alert-type' => 'error',
                'messege' => 'Failed to Added Testimonial.',

            );
        }

        return redirect()->route('admin.testimonials.index')->with($notification);
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
        $testimonial = Testimonial::findOrFail($id);
        // dd($testimonials->packages->pluck('id'));
        $packages = Package::where('status', 1)->get();
        $edit_packages = DB::table('package_testimonial')->join('packages','packages.id','package_testimonial.package_id')->select('packages.name','packages.id')->where('testimonial_id',$id)->get();

        return view('admin.testimonials.edit', compact('testimonial', 'packages','edit_packages'));
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
            $testimonials = Testimonial::findOrFail($id);
            $testimonials->name = $request->name;
            $testimonials->title = $request->title;
            $testimonials->content = $request->content;
            $testimonials->status = 1;
            $testimonials->rating = $request->rating;
            $testimonials->display_home = $request->display_home;
            $testimonials->date = $request->date;

            $banner = $request->file('file');
            if ($banner) {
               $this->deleteFile($testimonials->image);
                $testimonials->image =$this->uploadFile('upload/testimonial',$banner);

            }
            if ($testimonials->save()) {
                $length = count($request->package);
                DB::table('package_testimonial')->where('testimonial_id',$id)->delete();
                for ($i = 0; $i < $length; $i++) {
                    $package_testmonial = [];
                    $package_testmonial['package_id'] = $request->package[$i];
                    $package_testmonial['testimonial_id'] = $testimonials->id;
                    DB::table('package_testimonial')->insert($package_testmonial);
                }
            }

DB::commit();
            $notification = array(
                'alert-type' => 'success',
                'messege' => 'Successfully Updated Testimonial.',

            );
        } catch (QueryException $qE) {
            DB::rollBack();
            $notification = array(
                'alert-type' => 'error',
                'messege' => 'Failed to updated Testimonial.',

            );
        }

        return redirect()->route('admin.testimonials.index')->with($notification);
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
            $testimonial = Testimonial::findOrFail($id);
            $this->deleteFile($testimonial->image);

            $testimonial->delete();
            $notification = array(
                'alert-type' => 'success',
                'messege' => 'Successfully Deleted Testimonial.',

            );
        } catch (QueryException $e) {
            $notification = array(
                'alert-type' => 'success',
                'messege' => 'Failed to delete  Testimonial.',

            );
        }

        return redirect()->route('admin.testimonials.index')->with($notification);
    }
}

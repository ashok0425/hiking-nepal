<?php

namespace App\Http\Controllers\BackEnd\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Blog;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    private $status_message = NULL;
    private $alert_type = "success";
    private $blogs_image_path = "uploads/blogs";
    private $blogs_image_thumb_path = "uploads/blogs/thumbs";


    public function index(Request $request)
    {
        $blogs = Blog::orderBy('created_at', 'desc')->where('status',1)->paginate(10);

        return view('admin.blog.index', compact('blogs'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $blog=null;

        return view('admin.blog.create',compact('blog'));
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
            if($request->hasFile('image')) {
                // Uplaod Image
                $file = $request->file('image');
                $fileName = time()."-".$file->getClientOriginalName();
                $image = $this->blogs_image_path. '/' .$fileName;
                $upload_success= $file->move($this->blogs_image_path, $fileName);
                $upload = Image::make($image);
                $upload->fit(1100,500)->save($this->blogs_image_path .'/'. $fileName);
                $upload->fit(555,250)->save($this->blogs_image_thumb_path .'/'. $fileName);
                $request['blog_image'] = $fileName;
            }
            $blog = Blog::create($request->all());
            $this->alertMessage = "Successfully added blog.";
        } catch (QueryException $e) {
            // return $e->getMessage();
            $this->alertMessage = "Failed to add blog, Try again.";
            $this->alertType = "danger";
        }

            return redirect()->route('admin.blog.index')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);

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

        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
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
            $blog = Blog::findOrFail($id);
            if($request->hasFile('image')) {
                // Uplaod Image
                $file = $request->file('image');
                $fileName = time()."-".$file->getClientOriginalName();
                $image = $this->blogs_image_path. '/' .$fileName;
                $upload_success= $file->move($this->blogs_image_path, $fileName);
                $upload = Image::make($image);
                $upload->fit(800, 400)->save($this->blogs_image_path .'/'. $fileName);
                $upload->fit(555, 250)->save($this->blogs_image_thumb_path .'/'. $fileName);
                $request['blog_image'] = $fileName;
            }
            $blog->update($request->all());
            $this->alertMessage = "Successfully updated blog.";
        } catch (QueryException $e) {
            $this->alertMessage = "Failed to update blog, Try again.";
            $this->alertType = "danger";
        }

        return redirect()->route('admin.blog.index')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd('man');
        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();
            $blog->delete_old_image();


            $this->alertMessage = "Successfully deleted blog.";
        } catch (QueryException $e) {
            $this->alertMessage = "Failed to delete blog, Try again.";
            $this->alertType = "danger";
        }

        return redirect()->route('admin.blog.index')->with(['status_message' => $this->status_message, 'alert_type' => $this->alert_type]);
    }


    public function uploadimage(Request $request){
        $request->validate([
            'upload' => 'required|image'
        ]);

        $path = $request->file('upload')->store('uploads', ['disk' => 's3']);

        return ["url" => getFilePath($path)];

    }

}

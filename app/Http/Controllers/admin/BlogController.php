<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Str;
use File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Throwable;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
        $blogs=Blog::orderBy('ID','desc')->select('guid','ID','post_title','post_status')->get();

            return FacadesDataTables::of($blogs)
            ->editColumn('guid',function($row){
                return '<img src="'. getImageurl($row->guid) .'" width="80">';
            })

            ->editColumn('status',function($row){
                return  $row->post_status=="publish" ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Deactive</span>';
            })
            ->addColumn('action',function($row){
                $html='<a href="'.route('admin.blogs.edit',$row->ID) .'" class="btn btn-primary btn-sm pull-left m-r-10"><i class="fa fa-edit"></i>
                </a>

                <a href="'. route('admin.blogs.delete',$row->ID ) .'" class="btn btn-danger btn-sm delete_row" id="" ><i class="fa fa-trash"></i>
                </a>';

                if($row->status==1){
              $html.='<a href="'.route('admin.blog.deactive',['id'=>$row->ID,'table'=>'blogs']).'" class="btn btn-primary"><i class="fas fa-thumbs-down"></i></a>';
                       }else{

                        $html.=' <a href="'.route('admin.blog.active',['id'=>$row->ID,'table'=>'blogs']).'" class="btn btn-primary"><i class="fas fa-thumbs-up"></i></a>';
            }
return $html;
            }) ->rawColumns(['action','status','guid'])
            ->make(true);;
        }
       return view('admin.blog.index');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('admin.blog.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $url = $this->toAscii($request->url);

        $request->validate([
            'title'=>'required|max:255',

        ]);
        // try {
       $blog=[];
            $file=$request->file('image');

            if($file){
                $blog['guid']=$this->uploadFile('upload/blog',$file);
            }

            $cover_image=$request->file('cover_image');
            if($cover_image){
                 $blog['cover_image']=$this->uploadFile('upload/blog',$cover_image);

            }

            $blog['post_title']=$request->title;
            $blog['url']=$url;
            $blog['display_homepage']=$request->display_homepage;
            $blog['meta_title']=$request->meta_title;
            $blog['meta_description']=$request->meta_description;
            $blog['keyword']=$request->keyword;
            $blog['mobile_title']=$request->mobile_title;
            $blog['mobile_description']=$request->mobile_description;
            $blog['mobile_keyword']=$request->mobile_keyword;
            $blog['post_date']=today();
            $blog['post_status']='publish';
            $blog['post_content']=$request->content;
           DB::table('blogs')->insert($blog);
          Cache::forget('blogs');
                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Blog  updated',

                 );
                 return redirect()->route('admin.blogs.index')->with($notification);



        // } catch (\Throwable $th) {
        //     $notification=array(
        //         'alert-type'=>'error',
        //         'messege'=>'Something went wrong. Please try again later.',

        //      );
        //      return redirect()->back()->with($notification);

        // }

    }

    public function edit(Blog $blog)
    {
              $blog=Blog::find($blog->ID);
        return view('admin.blog.edit',compact('blog'));
    }


    public function update(Request $request,$id)
    {
        $url = $this->toAscii($request->url);

        $request->validate([
            'title'=>'required|max:255',

        ]);
        // try {
       $blog=[];

            $file=$request->file('image');

            if($file){
                $blog['guid']=$this->uploadFile('upload/blog',$file);
            }

            $cover_image=$request->file('cover_image');
            if($cover_image){
                 $blog['cover_image']=$this->uploadFile('upload/blog',$cover_image);

            }
            $blog['post_title']=$request->title;
            $blog['display_homepage']=$request->display_homepage;
            $blog['url']=$url;
            $blog['meta_title']=$request->meta_title;
            $blog['meta_description']=$request->meta_description;
            $blog['keyword']=$request->keyword;
            $blog['mobile_title']=$request->mobile_title;
            $blog['mobile_description']=$request->mobile_description;
            $blog['mobile_keyword']=$request->mobile_keyword;
            $blog['post_content']=$request->content;
           DB::table('blogs')->where('ID',$id)->update($blog);
           Cache::forget('blogs');

                $notification=array(
                    'alert-type'=>'success',
                    'messege'=>'Blog  updated',

                 );
                 return redirect()->route('admin.blogs.index')->with($notification);



        // } catch (\Throwable $th) {
        //     $notification=array(
        //         'alert-type'=>'error',
        //         'messege'=>'Something went wrong. Please try again later.',

        //      );
        //      return redirect()->back()->with($notification);

        // }

    }

    public function destroy($id)
    {
        try {
        DB::table('blogs')->where('ID',$id)->delete();
            $notification=array(
                'alert-type'=>'success',
                'messege'=>'Successfully deleted .',

             );
        } catch (Throwable $e) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to delete , Try again.',

             );
        }

        return redirect()->back()->with($notification);
    }











    protected function active($id,$table){
        DB::table($table)->where('ID',$id)->update([
             'post_status'=>'publish',
         ]);
         $notification=array(
             'alert-type'=>'success',
             'messege'=>'Status: Activated.',

          );
          return redirect()->back()->with($notification);
     }

     protected function deactive($id,$table){
        DB::table($table)->where('ID',$id)->update([
            'post_status'=>'disable',
        ]);
        $notification=array(
            'alert-type'=>'info',
            'messege'=>'Status: Deactivated',

         );
         return redirect()->back()->with($notification);
    }



    private function toAscii($str) {
        $clean = preg_replace('~[^\\pL\d]+~u', '-', $str);
        $clean = strtolower(trim($clean, '-'));

        return $clean;
    }

    public function uploadimage(Request $request){
        $request->validate([
            'upload' => 'required|image'
        ]);

        $path = $request->file('upload')->store('uploads', ['disk' => 's3']);

        return ["url" => getFilePath($path)];
    }

}

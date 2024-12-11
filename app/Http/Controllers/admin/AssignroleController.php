<?php
namespace App\Http\Controllers\backEnd;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Permission;
use Hash;
use Illuminate\Support\Facades\DB;

class AssignroleController extends Controller
{
    public function index(Request $request){
     $admin=DB::table('admins')->join('permissions','permissions.id','admins.role_id')->get();
     return view('admin.assignrole.index',compact('admin'));
    }


    public function create(){
        $role=Permission::all();
        return view('admin.assignrole.create',compact('role'));
       }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',


        ]);
        $admin=new Admin;
         $admin->name=$request->name;
         $admin->email=$request->email;
         $admin->role_id=$request->role;
         $admin->password=Hash::make($request->password);
         if($admin->save()){
          $notification=array(
            'alert-type'=>'success',
            'messege'=>'New Admin created',
             
         );
         }else{
            $notification=array(
                'alert-type'=>'info',
                'messege'=>'something went wrong please try again later !',
                 
             );
         }
         return redirect()->back()->with($notification);

    }

}

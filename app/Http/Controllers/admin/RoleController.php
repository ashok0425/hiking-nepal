<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Traits\status;
use App\Models\Permission;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file


    // use status;
  

    public function index()
    {
        $role=DB::table('permissions')->orderBy('id','desc')->get();
       return view('admin.role.index',compact('role'));
    }

    public function create(){
        return view('admin.role.create');
    }
  

    public function store(Request $request){
        $request->validate([
            'role'=>'required'
        ]);

        $role=new Permission;
        $role->role=$request->role;
        $role->dashboard=$request->dashboard;
        $role->category=$request->category;
        $role->profile=$request->profile;
        $role->coupon=$request->coupon;
        $role->product=$request->product;
        $role->order=$request->order;
        $role->banner=$request->banner;
        $role->faq=$request->faq;
        $role->setting=$request->setting;
        $role->blog=$request->blog;
        $role->user=$request->user;
        $role->vendor=$request->vendor;
        $role->gst=$request->gst;
        $role->subscribe=$request->subscribe;
        $role->email_history=$request->email_history;
        $role->role_permission=$request->role_permission;
        $role->addvertisment=$request->add;
        $role->contact=$request->contact;

        $role->save();
        
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Role permission Created',
             
         );
         return redirect()->back()->with($notification);
    }


    public function edit($id){
        $role=Permission::find($id);
        return view('admin.role.edit',compact('role'));
    }

    public function update(Request $request){
        $request->validate([
            'role'=>'required'
        ]);

        $role=Permission::find($request->id);
        $role->role=$request->role;
        $role->dashboard=$request->dashboard;
        $role->category=$request->category;
        $role->profile=$request->profile;
        $role->coupon=$request->coupon;
        $role->product=$request->product;
        $role->order=$request->order;
        $role->banner=$request->banner;
        $role->faq=$request->faq;
        $role->setting=$request->setting;
        $role->blog=$request->blog;
        $role->user=$request->user;
        $role->vendor=$request->vendor;
        $role->contact=$request->contact;

        $role->gst=$request->gst;
        $role->subscribe=$request->subscribe;
        $role->email_history=$request->email_history;
        $role->role_permission=$request->role_permission;
        $role->addvertisment=$request->add;
        $role->save();

        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Role permission Updated',
             
         );
         return redirect()->back()->with($notification);
    }
}



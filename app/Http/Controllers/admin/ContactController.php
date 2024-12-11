<?php

namespace App\Http\Controllers\backEnd;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\status;
use App\Models\Contact;
use App\Models\Contactmail;
use App\Models\Email;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{

// Note :: active,deactive,destroy,method are place in Traits/status file


    use status;
 
    public function index()
    {
        $contact=DB::table('contacts')->orderBy('id','desc')->get();
       return view('admin.contact.index',compact('contact'));
    }
    public function create($id)
{ }
   
  

    public function store(Request $request){

        try {

          //code...
         $mail=new Email;
         $mail->title=$request->title;
         $mail->detail=$request->detail;
         $file=$request->file('file');
 
         if($file){
             $fname=rand().'email.'.$file->getClientOriginalExtension();
             $mail->image='upload/email/vendor/'.$fname;
             // $path=Image::make($file)->resize(200,300);
             $file->move(public_path().'/upload/email/vendor/',$fname);
                 }
           $mail->save();
             $emailId=$mail->id;
             $contact=Contact::where('email',$request->email)->first();
             $contact->status=1;
             $contact->save();
             $subemail=new Contactmail;
             $subemail->contact_id=$contact->id;
             $subemail->email_id=$emailId;
             $subemail->save();
             $set=[
                 'email'=>$request->email,
                 'title'=>$request->title,
                 'emailId'=>$emailId,
 
 
             ];
     
                 // $detail=$request->detail;
 
            Mail::send('mail.subscriberemail', $set, function($message)use($set) {
        $message->to($set['email'])
                ->subject($set['title']);
    });
 
         $notification=array(
             'alert-type'=>'success',
             'messege'=>'Email Sent successfully',
            
          );
         return redirect()->route('admin.contacts.index')->with($notification);
     } catch (\Throwable $th) {
         $notification=array(
             'alert-type'=>'error',
             'messege'=>'Something went wrong.Try again later.',
            
          );
         return redirect()->route('admin.contact.index')->with($notification);
     }


     }

     public function edit($id)
     {
      $con=DB::table('contacts')->where('id',$id)->first();
        return view('admin.contact.create',compact('con'));
         
     }


}

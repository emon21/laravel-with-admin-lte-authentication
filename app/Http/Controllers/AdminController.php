<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use Illuminate\Support\Str;

use Auth;
use File;
use Hash;
class AdminController extends Controller
{
    //


   public function adminindex()
    {
        return view('admin.admin_home');
        
    }
    //model binding
    public function group(Student $id)
    {
        return $id;
    }

    //Accessor 
public function show()
{
    // return Student::all();
    // return Student::find($value);
    
     $pro = Student::all();
     return $pro;
    
}


    public function student(Student $student)
    {
        // return Student::all();
    //    $user = Student::find(1);
       
    //   return $user->name();

      $student = new Student();
      $student->name ='emon';
      $student->email ='emon@mail2233.com';
      $student->password;
      $student->phone ='12345678902';
      $student->save();
      
    }
    
    public function index()
    {
          // $uid  = Auth::user()->id;    
        // $req->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|min:8',
        // ]);   
        return view('admin/login');

       
        
    }

     public function register()
    {
        return view('admin/register');
    }
    public function profile()
    {
       // $userlist =User::all();
        $user=  auth::user()->id;
        $list = User::find($user);
        return view('admin/profile/userprofile',compact('list'));
       
        // if{Auth::check()->}
        // $list = User::find($user);

    }
    public function changeprofile($userid)
    {   
    
        $userlist = User::find($userid);
        return view('admin/profile/changeuser',compact('userlist'));
        
    }
    public function updateprofile(Request $req,User $user)
    {

     
       $userid = $req->userid;
     //  $userlist = User::find($userid);

      //  $std_id = $req->student_id;

      // return $userlist;

        if($req->hasFile('user_picture')){
           
        //     $sid = Student::find($std_id);
        // $destanation ='storage/student/'.$sid->std_picture;
        //     // $img->move('storage/service/',$service_id);
        // if (File::exists($destanation)) {
        //     File::delete($destanation);
        // }
         $sid = User::find($userid);
            $location ='storage/profile/'.$sid->user_picture;
                // $img->move('storage/service/',$service_id);
            if ($req->user_picture) {
              //   unlink($location);
     File::delete($location);
            }

            
            $img = $req->file('user_picture');
            $extension = $img->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $img->move('storage/profile',$filename); 
            User::where('id',$userid)->update([
                        'user_picture' =>$filename,
                        'updated_at' => Carbon::now()
                        ]);
        

         
                  return redirect('admin/profile/');
                        
                    }


                    elseif($req->hasFile('user_picture')){
                        
                           $img = $req->file('user_picture');
            $extension = $img->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $img->move('storage/profile',$filename); 
            User::where('id',$userid)->update([
                       'name'=>$req->user_name,
                     //   'email'=>$req->user_email,
                        'user_picture' =>$filename,
                        'updated_at' => Carbon::now()
                        ]);
                  return redirect('admin/profile/');
                    }

        //With out imgage only student info
        else{

            User::where('id',$userid)->update([
            'name'=>$req->user_name,
            'email'=>$req->user_email,
            'updated_at' => Carbon::now()
           ]);

            //    return redirect('admin/student/studentlist')->with('status',"Student Information Successfully Inserted...!!");
        return redirect('admin/profile/');

        }



        // $rulse=[
        //     'old_password' => "required",
        //     'new_password' => "required",
        // ];
        // $this->validate($req,$rulse);
        //   $req->validate([
        //     'old_password' => "required",
        //     'new_password' => "required",

        // ]);

        

        // if(Hash::check($req->old_password,Auth::user()->password)){
        // User::find(Auth::user()->id)->update([
        //     'password'=>bcrypt($req->new_password)
        // ]);
        //     return back()->with('status',"Password has been Changed...!!");
        // }
        // else{
        //     return back()->withErrors("Your Old Password dosn`T Match Our Record!");
        // }

    


     
        

      


    }

    public function changepassword(Request $req)
    {
     
        // $uid  = Auth::user()->id;    
        $req->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        if (Hash::check($req->old_password, Auth::user()->password)) {
            
            User::find(Auth::user()->id)->update([
               'password' => bcrypt($req->new_password), 
            ]);
            return back()->with('status','password has been cheanged...!!');
            
        }
        else{
            
            return back()->withErrors('Your Old Password does Not Match With Our Records...!!');
            
        }
       
        // return all();
         
    }
}
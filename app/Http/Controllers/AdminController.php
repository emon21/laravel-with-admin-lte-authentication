<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

use Auth;
use File;
use Hash;
class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin/login');
    }

     public function register()
    {
        return view('admin/register');
    }
    public function profile()
    {
        $userlist =User::all();
        return view('admin/profile/userprofile',compact('userlist'));
    }
    public function profilechange($userid)
    {   
    
        $userlist = User::find($userid);
        return view('admin/profile/changeuser',compact('userlist'));
        
    }
    public function changeprofile(Request $req)
    {
        $userid = $req->userid;
        if($req->hasFile('user_picture')){
        
        //User Find
        $proid = User::find($userid);
        //user profile delete && find
        $destanation ='storage/profile/'.$proid->user_picture;

        if(File::exists($destanation)) {
          File::delete($destanation);
          }
          
        //image process && Image Upload...
        $img = $req->file('user_picture');
        $extension = $img->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $img->move('storage/profile/',$filename);

        //update query
         User::where('id',$userid)->update([
            
            'name'=>$req->name,
            'email'=>$req->email,
            'user_picture'=>$filename,
            'updated_at' => Carbon::now()
        ]);

        }

        else{
            User::where('id',$userid)->update([
            'id'=>$req->userid,
            'name'=>$req->name,
            'email'=>$req->email,
            'updated_at' => Carbon::now()

        ]);

        // $rulse=[
        //     'old_password' => "required",
        //     'new_password' => "required",
        // ];
        // $this->validate($req,$rulse);
          $req->validate([
            'old_password' => "required",
            'new_password' => "required",

        ]);

        if(Hash::check($req->old_password,Auth::user()->password)){
        User::find(Auth::user()->id)->update([
            'password'=>bcrypt($req->new_password)
        ]);
            return back()->with('status',"Password has been Changed...!!");
        }
        else{
            return back()->withErrors("Your Old Password dosn`T Match Our Record!");
        }

    }


     
        

      

        return redirect('admin/profile/');

    }
}

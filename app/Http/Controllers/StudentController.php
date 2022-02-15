<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Auth;
use FILE;
use Hash;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentlist = Student::all();
       
       
        return view('admin/student/studentlist',compact('studentlist'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        //
        
        return view('admin/student/studentcreate');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
         $rulse=[
            'student_name' => "required",
            'student_email' => "required|email",
            'student_password' => "required",
            'student_picture' => "required",
            'student_phone' => "numeric|min:11",

        ];
        $cm =[
            'student_name.required' => "Student Name is Not Empty",
            'student_email.required' => "Email Must be valid Mail",
            'student_email.email' => "Email Must be valid Mail",
            'student_password.required' => "Password is Not Empty",
             'student_picture.required' => "Picture is Not Empty",
            'student_phone.numeric' => "Only Number Allow",
            
             
        ];
        $this->validate($req,$rulse,$cm);

        //With imgage && student info
        if($req->HasFile('student_picture')){
            $img = $req->file('student_picture');
            $extension = $img->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $img->move('storage/student',$filename); 
            
            Student::insert([
            'name' =>$req->student_name,
            'email' =>$req->student_email,
            'password' =>$req->student_password,
            'phone' =>$req->student_phone,
            'std_picture' =>$filename,
            'gender' =>$req->sex,
            'created_at' =>carbon::now(),

            ]);
  return redirect('admin/student/studentlist');
  //->back()->with('status',"Student Information Successfully Inserted...!!"
        }

        //With out imgage only student info
        else{

            Student::insert([
            'name' =>$req->student_name,
            'email' =>$req->student_email,
            'password' =>$req->student_password,
            'gender' =>$req->gender,
            'phone' =>$req->student_phone,
            'created_at' =>carbon::now(),
             ]);

               return redirect('admin/student/studentlist')->with('status',"Student Information Successfully Inserted...!!");
        }
       
        
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    
        $studentlist = Student::find($student);
        // return $studentlist;
        return view('admin/student/studentshow',compact('studentlist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student,$student_id)
    {
        $data = Student::find($student_id);
        return view('admin/student/studentedit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Student $student)
    {
        
        $std_id = $req->student_id;
       if($req->hasFile('student_picture')){
           
            $student = Student::find($std_id);
            $location ='storage/student/'.$student->std_picture;
                // $img->move('storage/service/',$service_id);
            if ($student->std_picture) {
               unlink($location);
              // File::delete($location);
            }
            
                       $img = $req->file('student_picture');
                       $extension = $img->getClientOriginalExtension();
                       $filename = time().'.'.$extension;
                       $img->move('storage/student',$filename); 
                       Student::where('id',$std_id)->update([
                        'name' =>$req->student_name,
                        'email' =>$req->student_email,
                        'std_picture' =>$filename,
                        'updated_at' => Carbon::now()
                        ]);
                    }
      
        else{
                        Student::where('id',$std_id)->update([
                        'name' =>$req->student_name,
                        'email' =>$req->student_email,
                        'updated_at' => Carbon::now()
                        ]);
        }
       
            return redirect('admin/student/studentlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student,$student_id)
    {
        
          $student = Student::find($student_id);

    //   $img = $student->std_picture;
    //   unlink($img);
            $location ='storage/student/'.$student->std_picture;
                // $img->move('storage/service/',$service_id);
            if ($student->std_picture) {
               unlink($location);
              // File::delete($location);
            }

         // $student->delete();
  
      
      Student::destroy($student_id);
         return back();
    }


    public function studentstatus(Request $req,$studentstatus)
    {
        $student = Student::find($studentstatus);

        // $student ->status = $req->studentstatus;
        // $student->save();
    
        if($student->status == '1'){
            $status = 0;
        }
        else{
            $status =1; 
        }

         Student::where('id',$studentstatus)->update([
                        'status' =>$status,
                        ]);
                        return redirect('admin/student/studentlist')->with('status','Student Status has Been Updated...!!');
    }
}